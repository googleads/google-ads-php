<?php

/**
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Examples\AccountManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Enums\IdentityVerificationProgramEnum\IdentityVerificationProgram;
use Google\Ads\GoogleAds\V18\Enums\IdentityVerificationProgramStatusEnum\IdentityVerificationProgramStatus;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\Client\IdentityVerificationServiceClient;
use Google\Ads\GoogleAds\V18\Services\GetIdentityVerificationRequest;
use Google\Ads\GoogleAds\V18\Services\IdentityVerification;
use Google\Ads\GoogleAds\V18\Services\StartIdentityVerificationRequest;
use Google\ApiCore\ApiException;

/**
 * This code example illustrates how to retrieve the status of the advertiser identity verification
 * program and, if required and not already started, how to start the verification process.
 */
class VerifyAdvertiserIdentity
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Retrieves the current Advertiser Identity Verification status.
        $identityVerificationServiceClient = $googleAdsClient->getIdentityVerificationServiceClient();
        $identityVerification =
            self::getIdentityVerification($customerId, $identityVerificationServiceClient);
        if (is_null($identityVerification)) {
            // If getIdentityVerification returned an empty response, the account is not enrolled in
            // mandatory identity verification.
            printf(
                "Account %d is not required to perform advertiser identity verification.%s",
                $customerId,
                PHP_EOL
            );
            print 'See https://support.google.com/adspolicy/answer/9703665 for details on how and'
                . ' when an account is required to undergo the advertiser identity verification'
                . ' program.' . PHP_EOL;
            return;
        }

        switch ($identityVerification->getVerificationProgress()->getProgramStatus()) {
            case IdentityVerificationProgramStatus::UNSPECIFIED:
                // Starts an identity verification session.
                self::startIdentityVerification($customerId, $identityVerificationServiceClient);
                // Calls getIdentityVerification again to retrieve the verification progress after
                // starting an identity verification session.
                self::getIdentityVerification($customerId, $identityVerificationServiceClient);
                break;
            case IdentityVerificationProgramStatus::PENDING_USER_ACTION:
                // If there is an identity verification session in progress, there is no need to
                // start another one by calling startIdentityVerification.
                print 'There is an advertiser identify verification session in progress.';
                printf(
                    "The URL for the verification process is '%s' and it will expire at '%s'.%s",
                    $identityVerification->getVerificationProgress()->getActionUrl(),
                    $identityVerification->getVerificationProgress()
                        ->getInvitationLinkExpirationTime(),
                    PHP_EOL
                );
                break;
            case IdentityVerificationProgramStatus::PENDING_REVIEW:
                print 'The verification is under review' . PHP_EOL;
                break;
            case IdentityVerificationProgramStatus::SUCCESS:
                print 'The verification already completed' . PHP_EOL;
                break;
            case IdentityVerificationProgramStatus::UNKNOWN:
            default:
                throw new \UnexpectedValueException(
                    'The identity verification has an unknown state.'
                );
        }
    }

    /**
     * Retrieves the status of the advertiser identity verification process.
     *
     * @param int $customerId the customer ID
     * @param IdentityVerificationServiceClient $identityVerificationServiceClient the identity
     *     verification service client
     * @return IdentityVerification|null the retrieved identity verification
     */
    // [START verify_advertiser_identity_1]
    private static function getIdentityVerification(
        int $customerId,
        IdentityVerificationServiceClient $identityVerificationServiceClient
    ) {
        // Gets an identity verification response.
        $response = $identityVerificationServiceClient->getIdentityVerification(
            GetIdentityVerificationRequest::build($customerId)
        );
        if (empty($response->getIdentityVerification())) {
            return null;
        }

        // Prints some details about the retrieved identity verification.
        /** @var IdentityVerification $identityVerification */
        $identityVerification = $response->getIdentityVerification()->getIterator()->current();
        $deadline = $identityVerification->getIdentityVerificationRequirement()
            ->getVerificationCompletionDeadlineTime();
        $progress = $identityVerification->getVerificationProgress();
        printf(
            "Account %d has a verification completion deadline of '%s' and status '%s' for"
            . " advertiser identity verification.%s",
            $customerId,
            $deadline,
            IdentityVerificationProgramStatus::name($progress->getProgramStatus()),
            PHP_EOL
        );

        return $identityVerification;
    }
    // [END verify_advertiser_identity_1]

    /**
     * Starts the identity verification process.
     *
     * @param int $customerId the customer ID
     * @param IdentityVerificationServiceClient $identityVerificationServiceClient the identity
     *     verification service client
     */
    // [START verify_advertiser_identity_2]
    private static function startIdentityVerification(
        int $customerId,
        IdentityVerificationServiceClient $identityVerificationServiceClient
    ): void {
        // Sends a request to start the identity verification process.
        $identityVerificationServiceClient->startIdentityVerification(
            StartIdentityVerificationRequest::build(
                $customerId,
                IdentityVerificationProgram::ADVERTISER_IDENTITY_VERIFICATION
            )
        );
    }
    // [END verify_advertiser_identity_2]
}

VerifyAdvertiserIdentity::main();

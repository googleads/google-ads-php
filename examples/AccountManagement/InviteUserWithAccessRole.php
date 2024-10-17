<?php

/**
 * Copyright 2021 Google LLC
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
use Google\Ads\GoogleAds\V18\Enums\AccessRoleEnum\AccessRole;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CustomerUserAccessInvitation;
use Google\Ads\GoogleAds\V18\Services\CustomerUserAccessInvitationOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerUserAccessInvitationRequest;
use Google\ApiCore\ApiException;

/**
 * This code example sends an invitation email to a user to manage a customer account with a
 * desired access role.
 */
class InviteUserWithAccessRole
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Email address of the user to send the invitation to.
    private const EMAIL_ADDRESS = 'INSERT_EMAIL_ADDRESS_HERE';

    // The access role for which the user is invited, such as 'ADMIN'. Must be one of the names of
    // the constants defined in AccessRoleEnum/AccessRole.php.
    private const ACCESS_ROLE = 'INSERT_ACCESS_ROLE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::EMAIL_ADDRESS => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ACCESS_ROLE => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::EMAIL_ADDRESS] ?: self::EMAIL_ADDRESS,
                $options[ArgumentNames::ACCESS_ROLE] ?: self::ACCESS_ROLE
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
     * @param string $emailAddress the email address of the user to send the invitation to
     * @param string $accessRole the access role for which the user is invited
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $emailAddress,
        string $accessRole
    ) {
        // [START invite_user_with_access_role]
        // Creates a customer user access invitation.
        $customerUserAccessInvitation = new CustomerUserAccessInvitation([
            'email_address' =>  $emailAddress,
            'access_role' => AccessRole::value($accessRole)
        ]);

        // Creates a customer user access invitation operation.
        $customerUserAccessInvitationOperation = new CustomerUserAccessInvitationOperation();
        $customerUserAccessInvitationOperation->setCreate($customerUserAccessInvitation);

        // Issues a mutate request to send the customer user access invitation and prints its
        // information.
        $customerUserAccessInvitationServiceClient =
            $googleAdsClient->getCustomerUserAccessInvitationServiceClient();
        $response = $customerUserAccessInvitationServiceClient->mutateCustomerUserAccessInvitation(
            MutateCustomerUserAccessInvitationRequest::build(
                $customerId,
                $customerUserAccessInvitationOperation
            )
        );
        printf(
            "Customer user access invitation with resource name '%s' was sent from customer "
            . "ID %d to email address '%s' with access role '%s'.%s",
            $response->getResult()->getResourceName(),
            $customerId,
            $emailAddress,
            $accessRole,
            PHP_EOL
        );
        // [END invite_user_with_access_role]
    }
}

InviteUserWithAccessRole::main();

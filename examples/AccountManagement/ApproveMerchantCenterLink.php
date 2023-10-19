<?php

/**
 * Copyright 2020 Google LLC
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
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\V14\Enums\MerchantCenterLinkStatusEnum\MerchantCenterLinkStatus;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\MerchantCenterLink;
use Google\Ads\GoogleAds\V14\Services\Client\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V14\Services\ListMerchantCenterLinksRequest;
use Google\Ads\GoogleAds\V14\Services\MerchantCenterLinkOperation;
use Google\Ads\GoogleAds\V14\Services\MutateMerchantCenterLinkRequest;
use Google\ApiCore\ApiException;

/**
 * Demonstrates how to approve a Merchant Center link request.
 *
 * <p>Prerequisite: You need to have access to a Merchant Center account. You can find instructions
 * to create a Merchant Center account here: https://support.google.com/merchants/answer/188924.
 *
 * <p>To run this example, you must use the Merchant Center UI or the Content API for Shopping to
 * send a link request between your Merchant Center and Google Ads accounts.
 * See https://support.google.com/merchants/answer/6159060 for details.
 *
 * <p> This code example uses version v14 of the Google Ads API. Version v15 of the
 * Google Ads API replaces MerchantCenterLinkService with ProductLinkInvitationService and
 * ProductLinkService. We will add new code examples using these services shortly.
 */
class ApproveMerchantCenterLink
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const MERCHANT_CENTER_ACCOUNT_ID = 'INSERT_MERCHANT_CENTER_ACCOUNT_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT

        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            // We set this value to true to show how to use GAPIC v2 source code. You can remove the
            // below line if you wish to use the old-style source code. Note that in that case, you
            // probably need to modify some parts of the code below to make it work.
            // For more information, see
            // https://developers.devsite.corp.google.com/google-ads/api/docs/client-libs/php/gapic.
            ->usingGapicV2Source(true)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID] ?: self::MERCHANT_CENTER_ACCOUNT_ID
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
     * @param int $merchantCenterAccountId the Merchant Center account ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId
    ) {
        // [START approve_merchant_center_link]
        // Lists all merchant links of the specified customer ID.
        $merchantCenterLinkServiceClient = $googleAdsClient->getMerchantCenterLinkServiceClient();
        $response = $merchantCenterLinkServiceClient->listMerchantCenterLinks(
            ListMerchantCenterLinksRequest::build($customerId)
        );
        printf(
            "%d Merchant Center link(s) found with the following details:%s",
            $response->getMerchantCenterLinks()->count(),
            PHP_EOL
        );
        // [END approve_merchant_center_link]
        foreach ($response->getMerchantCenterLinks() as $merchantCenterLink) {
            /** @var MerchantCenterLink $merchantCenterLink */
            // [START approve_merchant_center_link_1]
            printf(
                "Link '%s' has status '%s'.%s",
                $merchantCenterLink->getResourceName(),
                MerchantCenterLinkStatus::name($merchantCenterLink->getStatus()),
                PHP_EOL
            );
            // [END approve_merchant_center_link_1]
            // Approves a pending link request for a Google Ads account with the specified customer
            // ID from a Merchant Center account with the specified Merchant Center account ID.
            if (
                $merchantCenterLink->getId() === $merchantCenterAccountId
                && $merchantCenterLink->getStatus() === MerchantCenterLinkStatus::PENDING
            ) {
                // Updates the status of Merchant Center link to 'ENABLED' to approve the link.
                self::updateMerchantCenterLinkStatus(
                    $merchantCenterLinkServiceClient,
                    $customerId,
                    $merchantCenterLink,
                    MerchantCenterLinkStatus::ENABLED
                );
                // There is only one MerchantCenterLink object for a given Google Ads account and
                // Merchant Center account, so we can break early.
                break;
            }
        }
    }

    /**
     * Updates the status of a Merchant Center link with a specified Merchant Center link status.
     *
     * @param MerchantCenterLinkServiceClient $merchantCenterLinkServiceClient the Merchant Center
     *     link service client
     * @param int $customerId the customer ID
     * @param MerchantCenterLink $merchantCenterLink the Merchant Center link to update
     * @param int $newMerchantCenterLinkStatus the status to be updated to
     */
    // [START approve_merchant_center_link_2]
    private static function updateMerchantCenterLinkStatus(
        MerchantCenterLinkServiceClient $merchantCenterLinkServiceClient,
        int $customerId,
        MerchantCenterLink $merchantCenterLink,
        int $newMerchantCenterLinkStatus
    ) {
        // Creates an updated MerchantCenterLink object derived from the original, but with the
        // specified status.
        $merchantCenterLinkToUpdate = new MerchantCenterLink([
            'resource_name' => $merchantCenterLink->getResourceName(),
            'status' => $newMerchantCenterLinkStatus
        ]);

        // Constructs an operation that will update the Merchant Center link,
        // using the FieldMasks utility to derive the update mask. This mask tells the
        // Google Ads API which attributes of the Merchant Center link you want to change.
        $merchantCenterLinkOperation = new MerchantCenterLinkOperation();
        $merchantCenterLinkOperation->setUpdate($merchantCenterLinkToUpdate);
        $merchantCenterLinkOperation->setUpdateMask(
            FieldMasks::allSetFieldsOf($merchantCenterLinkToUpdate)
        );

        // Issues a mutate request to update the Merchant Center link and prints some
        // information.
        $response = $merchantCenterLinkServiceClient->mutateMerchantCenterLink(
            MutateMerchantCenterLinkRequest::build($customerId, $merchantCenterLinkOperation)
        );
        printf(
            "Approved a Merchant Center Link with resource name '%s' to the Google Ads "
            . "account '%s'.%s",
            $response->getResult()->getResourceName(),
            $customerId,
            PHP_EOL
        );
    }
    // [END approve_merchant_center_link_2]
}

ApproveMerchantCenterLink::main();

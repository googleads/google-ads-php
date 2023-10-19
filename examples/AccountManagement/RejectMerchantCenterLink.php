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
use Google\Ads\GoogleAds\V14\Enums\MerchantCenterLinkStatusEnum\MerchantCenterLinkStatus;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\MerchantCenterLink;
use Google\Ads\GoogleAds\V14\Services\Client\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V14\Services\ListMerchantCenterLinksRequest;
use Google\Ads\GoogleAds\V14\Services\MerchantCenterLinkOperation;
use Google\Ads\GoogleAds\V14\Services\MutateMerchantCenterLinkRequest;
use Google\ApiCore\ApiException;

/**
 * Demonstrates how to reject a Merchant Center link request.
 *
 * Prerequisite: You need to have access to a Merchant Center account. You can find instructions
 * to create a Merchant Center account here: https://support.google.com/merchants/answer/188924.
 *
 * To run this example, you must use the Merchant Center UI or the Content API for Shopping to
 * send a link request between your Merchant Center and Google Ads accounts.
 *
 * <p> This code example uses version v14 of the Google Ads API. Version v15 of the
 * Google Ads API replaces MerchantCenterLinkService with ProductLinkInvitationService and
 * ProductLinkService. We will add new code examples using these services shortly.
 */
class RejectMerchantCenterLink
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
                $options[ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID]
                    ?: self::MERCHANT_CENTER_ACCOUNT_ID
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
     * @param int $customerId the customer ID of the Google Ads account to reject the link request
     * @param int $merchantCenterAccountId the Merchant Center account ID for the account requesting
     *     to link
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId
    ) {
        $merchantCenterLinkService = $googleAdsClient->getMerchantCenterLinkServiceClient();

        // Rejects a pending link request or unlinks an enabled link for a Google Ads account with
        // $customerId from a Merchant Center account with $merchantCenterAccountId.
        $response = $merchantCenterLinkService->listMerchantCenterLinks(
            ListMerchantCenterLinksRequest::build($customerId)
        );
        printf(
            "%d Merchant Center link(s) found with the following details:%s",
            $response->getMerchantCenterLinks()->count(),
            PHP_EOL
        );

        foreach ($response->getMerchantCenterLinks() as $merchantCenterLink) {
            /** @var MerchantCenterLink $merchantCenterLink */
            printf(
                "Link '%s' has status '%s'.%s",
                $merchantCenterLink->getResourceName(),
                MerchantCenterLinkStatus::name($merchantCenterLink->getStatus()),
                PHP_EOL
            );

            // Checks if there is a link for the Merchant Center account we are looking for.
            if ($merchantCenterAccountId === $merchantCenterLink->getId()) {
                // If the Merchant Center link is pending, reject it by removing the link.
                // If the Merchant Center link is enabled, unlink Merchant Center from Google Ads by
                // removing the link.
                // In both cases, the remove action is the same.
                self::removeMerchantCenterLink(
                    $merchantCenterLinkService,
                    $customerId,
                    $merchantCenterLink
                );
                // There is only one MerchantCenterLink object for a given Google Ads account and
                // Merchant Center account, so we can break early.
                break;
            }
        }
    }

    /**
     * Removes a Merchant Center link from a Google Ads client customer account.
     *
     * @param MerchantCenterLinkServiceClient $merchantCenterLinkServiceClient the
     *     MerchantCenterLinkService client
     * @param int $customerId the customer ID of the Google Ads account that has the link request
     * @param MerchantCenterLink $merchantCenterLink the MerchantCenterLink object to remove
     */
    // [START reject_merchant_center_link]
    private static function removeMerchantCenterLink(
        MerchantCenterLinkServiceClient $merchantCenterLinkServiceClient,
        int $customerId,
        MerchantCenterLink $merchantCenterLink
    ) {
        // Creates a single remove operation, specifying the Merchant Center link resource name.
        $merchantCenterLinkOperation = new MerchantCenterLinkOperation();
        $merchantCenterLinkOperation->setRemove($merchantCenterLink->getResourceName());

        // Issues a mutate request to remove the link and prints the result info.
        $response = $merchantCenterLinkServiceClient->mutateMerchantCenterLink(
            MutateMerchantCenterLinkRequest::build(
                $customerId,
                $merchantCenterLinkOperation
            )
        );
        $mutateMerchantCenterLinkResult = $response->getResult();
        printf(
            "Removed Merchant Center link with resource name: '%s'.%s",
            $mutateMerchantCenterLinkResult->getResourceName(),
            PHP_EOL
        );
    }
    // [END reject_merchant_center_link]
}

RejectMerchantCenterLink::main();

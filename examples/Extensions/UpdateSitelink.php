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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V14\ResourceNames;
use Google\Ads\GoogleAds\V14\Common\SitelinkFeedItem;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V14\Services\ExtensionFeedItemOperation;
use Google\ApiCore\ApiException;

/**
 * Updates the sitelink extension feed item with the specified link text.
 */
class UpdateSitelink
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ITEM_ID = 'INSERT_FEED_ITEM_ID_HERE';
    private const SITELINK_TEXT = 'INSERT_SITELINK_TEXT_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::SITELINK_TEXT => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::FEED_ITEM_ID] ?: self::FEED_ITEM_ID,
                $options[ArgumentNames::SITELINK_TEXT] ?: self::SITELINK_TEXT
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
     * @param int $customerId the client customer ID
     * @param int $feedItemId the feed item ID
     * @param string $sitelinkText the new sitelink text to update to
     */
    // [START update_sitelink]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedItemId,
        string $sitelinkText
    ) {
        // Creates an extension feed item using the specified feed item ID and sitelink text.
        $extensionFeedItem = new ExtensionFeedItem([
            'resource_name' => ResourceNames::forExtensionFeedItem($customerId, $feedItemId),
            'sitelink_feed_item' => new SitelinkFeedItem(['link_text' => $sitelinkText])
        ]);

        // Constructs an operation that will update the extension feed item, using the FieldMasks
        // utility to derive the update mask. This mask tells the Google Ads API which attributes of
        // the extension feed item you want to change.
        $extensionFeedItemOperation = new ExtensionFeedItemOperation();
        $extensionFeedItemOperation->setUpdate($extensionFeedItem);
        $extensionFeedItemOperation->setUpdateMask(FieldMasks::allSetFieldsOf($extensionFeedItem));

        // Issues a mutate request to update the extension feed item.
        $extensionFeedItemServiceClient = $googleAdsClient->getExtensionFeedItemServiceClient();
        $response = $extensionFeedItemServiceClient->mutateExtensionFeedItems(
            $customerId,
            [$extensionFeedItemOperation]
        );

        // Prints the resource name of the updated extension feed item.
        /** @var ExtensionFeedItem $updatedExtensionFeedItem */
        $updatedExtensionFeedItem = $response->getResults()[0];
        printf(
            "Updated extension feed item with resource name: '%s'.%s",
            $updatedExtensionFeedItem->getResourceName(),
            PHP_EOL
        );
    }
    // [END update_sitelink]
}

UpdateSitelink::main();

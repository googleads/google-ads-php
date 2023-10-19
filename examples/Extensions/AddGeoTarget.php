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
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V15\ResourceNames;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V15\Services\ExtensionFeedItemOperation;
use Google\Ads\GoogleAds\V15\Services\MutateExtensionFeedItemsRequest;
use Google\ApiCore\ApiException;

/**
 * Adds a geo target to an extension feed item for targeting.
 */
class AddGeoTarget
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ITEM_ID = 'INSERT_FEED_ITEM_ID_HERE';

    // A list of country codes can be referenced here:
    // https://developers.google.com/adwords/api/docs/appendix/geotargeting
    private const GEO_TARGET_CONSTANT_ID = 2840; // US

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::GEO_TARGET_CONSTANT_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::FEED_ITEM_ID] ?: self::FEED_ITEM_ID,
                $options[ArgumentNames::GEO_TARGET_CONSTANT_ID] ?: self::GEO_TARGET_CONSTANT_ID
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
     * @param int $geoTargetConstantId the geo target constant ID to add to the extension feed item
     */
    // [START add_geo_target]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedItemId,
        int $geoTargetConstantId
    ) {
        // Creates an extension feed item using the specified feed item ID and geo target constant
        // ID for targeting.
        $extensionFeedItem = new ExtensionFeedItem([
            'resource_name' => ResourceNames::forExtensionFeedItem($customerId, $feedItemId),
            'targeted_geo_target_constant'
                => ResourceNames::forGeoTargetConstant($geoTargetConstantId)
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
            MutateExtensionFeedItemsRequest::build($customerId, [$extensionFeedItemOperation])
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
    // [END add_geo_target]
}

AddGeoTarget::main();

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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V15\ResourceNames;
use Google\Ads\GoogleAds\V15\Common\Money;
use Google\Ads\GoogleAds\V15\Common\PromotionAsset;
use Google\Ads\GoogleAds\V15\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Resources\AdGroupAsset;
use Google\Ads\GoogleAds\V15\Resources\Asset;
use Google\Ads\GoogleAds\V15\Resources\CampaignAsset;
use Google\Ads\GoogleAds\V15\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V15\Resources\FeedItem;
use Google\Ads\GoogleAds\V15\Services\AdGroupAssetOperation;
use Google\Ads\GoogleAds\V15\Services\AssetOperation;
use Google\Ads\GoogleAds\V15\Services\CampaignAssetOperation;
use Google\Ads\GoogleAds\V15\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V15\Services\MutateAdGroupAssetsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateCampaignAssetsRequest;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * This code example retrieves the full details of a Promotion Feed-based extension and
 * creates a matching Promotion asset-based extension. The new Asset-based extension will
 * then be associated with the same campaigns and ad groups as the original Feed-based
 * extension.
 * Once copied, you should remove the Feed-based extension; see
 * RemoveEntireSitelinkCampaignExtensionSetting.php for an example.
 */
class MigratePromotionFeedToAsset
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // The ID of the extension feed item to migrate.
    private const FEED_ITEM_ID = 'INSERT_FEED_ITEM_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::FEED_ITEM_ID] ?: self::FEED_ITEM_ID
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
     * @param int $feedItemId ID of the extension feed item to migrate
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedItemId
    ) {
        $extensionFeedItemResourceName =
            ResourceNames::forExtensionFeedItem($customerId, $feedItemId);
        // Get the target extension feed item.
        $extensionFeedItem = self::getExtensionFeedItem($googleAdsClient, $customerId, $feedItemId);
        // Get all campaign IDs associated with the extension feed item.
        $campaignIds = self::getTargetedCampaignIds(
            $googleAdsClient,
            $customerId,
            $extensionFeedItemResourceName
        );
        // Get all ad group IDs associated with the extension feed item.
        $adGroupIds = self::getTargetedAdGroupIds(
            $googleAdsClient,
            $customerId,
            $extensionFeedItemResourceName
        );
        // Create a new Promotion asset that matches the target extension feed item.
        $promotionAssetResourceName =
            self::createPromotionAssetFromFeed($googleAdsClient, $customerId, $extensionFeedItem);
        // Associate the new Promotion asset with the same campaigns as the original.
        self::associateAssetWithCampaigns(
            $googleAdsClient,
            $customerId,
            $promotionAssetResourceName,
            $campaignIds
        );
        // Associate the new Promotion asset with the same ad groups as the original.
        self::associateAssetWithAdGroups(
            $googleAdsClient,
            $customerId,
            $promotionAssetResourceName,
            $adGroupIds
        );
    }

    /**
     * Gets the requested Promotion-type extension feed item.
     *
     * Note that extension feed items pertain to feeds that were created by Google. Use
     * FeedService to instead retrieve a user-created Feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $feedItemId the ID of the extension feed item to fetch
     * @return ExtensionFeedItem|null the requested extension feed item or null if no matching
     *     extension feed item was found
     */
    private static function getExtensionFeedItem(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedItemId
    ): ?ExtensionFeedItem {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Create a query that will retrieve the requested Promotion-type extension feed item
        // and ensure that all fields are populated.
        $query = "SELECT
            extension_feed_item.id,
            extension_feed_item.ad_schedules,
            extension_feed_item.device,
            extension_feed_item.status,
            extension_feed_item.start_date_time,
            extension_feed_item.end_date_time,
            extension_feed_item.targeted_campaign,
            extension_feed_item.targeted_ad_group,
            extension_feed_item.promotion_feed_item.discount_modifier,
            extension_feed_item.promotion_feed_item.final_mobile_urls,
            extension_feed_item.promotion_feed_item.final_url_suffix,
            extension_feed_item.promotion_feed_item.final_urls,
            extension_feed_item.promotion_feed_item.language_code,
            extension_feed_item.promotion_feed_item.money_amount_off.amount_micros,
            extension_feed_item.promotion_feed_item.money_amount_off.currency_code,
            extension_feed_item.promotion_feed_item.occasion,
            extension_feed_item.promotion_feed_item.orders_over_amount.amount_micros,
            extension_feed_item.promotion_feed_item.orders_over_amount.currency_code,
            extension_feed_item.promotion_feed_item.percent_off,
            extension_feed_item.promotion_feed_item.promotion_code,
            extension_feed_item.promotion_feed_item.promotion_end_date,
            extension_feed_item.promotion_feed_item.promotion_start_date,
            extension_feed_item.promotion_feed_item.promotion_target,
            extension_feed_item.promotion_feed_item.tracking_url_template
        FROM extension_feed_item
        WHERE
            extension_feed_item.extension_type = 'PROMOTION'
            AND extension_feed_item.id = $feedItemId
        LIMIT 1";

        $fetchedExtensionFeedItem = null;

        // Issue a search request to get the extension feed item contents.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        $currentElement = $stream->iterateAllElements()->current();
        if (!is_null($currentElement)) {
            /** @var ExtensionFeedItem $fetchedExtensionFeedItem */
            $fetchedExtensionFeedItem = $currentElement->getExtensionFeedItem();
            printf(
                "Retrieved details for extension feed item with ID %d.%s",
                $fetchedExtensionFeedItem->getId(),
                PHP_EOL
            );
        } else {
            // No need to get URL custom parameters if the extension feed item wasn't found.
            return null;
        }

        // Create a query to retrieve any URL customer parameters attached to the feed item.
        $urlCustomParametersQuery = "SELECT feed_item.url_custom_parameters FROM feed_item "
            . "WHERE feed_item.id = $feedItemId";
        // Issue a search request to get any URL custom parameters.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $urlCustomParametersQuery)
        );
        /** @var FeedItem $fetchedFeedItem */
        $fetchedFeedItem = $stream->iterateAllElements()->current()->getFeedItem();
        $urlCustomParameters = $fetchedFeedItem->getUrlCustomParameters();
        printf(
            "Retrieved %d attached URL custom parameters.%s",
            count($urlCustomParameters),
            PHP_EOL
        );

        if (!empty($urlCustomParameters)) {
            $fetchedExtensionFeedItem->getPromotionFeedItem()->setUrlCustomParameters(
                $urlCustomParameters
            );
        }
        return $fetchedExtensionFeedItem;
    }

    /**
     * Finds and returns all of the campaigns that are associated with the specified Promotion
     * extension feed item.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $extensionFeedItemResourceName the resource name of the extension feed item to
     *     migrate
     * @return int[] the list of campaign IDs associated with the specified extension feed item
     */
    // [START migrate_promotion_feed_to_asset_1]
    private static function getTargetedCampaignIds(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $extensionFeedItemResourceName
    ): array {
        $campaignIds = [];
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Create a query that will retrieve the campaign extension settings.
        $query = "SELECT campaign.id, campaign_extension_setting.extension_feed_items "
            . "FROM campaign_extension_setting "
            . "WHERE campaign_extension_setting.extension_type = 'PROMOTION' "
            . "AND campaign.status != 'REMOVED'";

        // Issue a search request to get the campaign extension settings.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            // Add the campaign ID to the list of IDs if the extension feed item is
            // associated with this extension setting.
            if (
                in_array(
                    $extensionFeedItemResourceName,
                    iterator_to_array(
                        $googleAdsRow->getCampaignExtensionSetting()->getExtensionFeedItems()
                    )
                )
            ) {
                printf(
                    "Found matching campaign with ID %d.%s",
                    $googleAdsRow->getCampaign()->getId(),
                    PHP_EOL
                );
                $campaignIds[] = $googleAdsRow->getCampaign()->getId();
            }
        }
        return $campaignIds;
    }
    // [END migrate_promotion_feed_to_asset_1]

    /**
     * Finds and returns all of the ad groups that are associated with the specified Promotion
     * extension feed item.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $extensionFeedItemResourceName the resource name of the extension feed item to
     *     migrate
     * @return int[] the list of ad group IDs associated with the specified extension feed item
     */
    private static function getTargetedAdGroupIds(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $extensionFeedItemResourceName
    ): array {
        $adGroupIds = [];
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Create a query that will retrieve the ad group extension settings.
        $query = "SELECT ad_group.id, ad_group_extension_setting.extension_feed_items "
            . "FROM ad_group_extension_setting "
            . "WHERE ad_group_extension_setting.extension_type = 'PROMOTION' "
            . "AND ad_group.status != 'REMOVED'";

        // Issue a search request to get the ad group extension settings.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            // Add the ad group ID to the list of IDs if the extension feed item is
            // associated with this extension setting.
            if (
                in_array(
                    $extensionFeedItemResourceName,
                    iterator_to_array(
                        $googleAdsRow->getAdGroupExtensionSetting()->getExtensionFeedItems()
                    )
                )
            ) {
                printf(
                    "Found matching ad group with ID %d.%s",
                    $googleAdsRow->getAdGroup()->getId(),
                    PHP_EOL
                );
                $adGroupIds[] = $googleAdsRow->getAdGroup()->getId();
            }
        }
        return $adGroupIds;
    }

    /**
     * Create a Promotion asset that copies values from the specified extension feed item.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param ExtensionFeedItem $extensionFeedItem the extension feed item to be migrated
     * @return string the resource name of the newly created Promotion asset
     */
    // [START migrate_promotion_feed_to_asset]
    private static function createPromotionAssetFromFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ExtensionFeedItem $extensionFeedItem
    ): string {
        $promotionFeedItem = $extensionFeedItem->getPromotionFeedItem();
        // Creates the Promotion asset.
        $asset = new Asset([
            // Name field is optional.
            'name' => 'Migrated from feed item #' . $extensionFeedItem->getId(),
            'promotion_asset' => new PromotionAsset([
                'promotion_target' => $promotionFeedItem->getPromotionTarget(),
                'discount_modifier' => $promotionFeedItem->getDiscountModifier(),
                'redemption_start_date' => $promotionFeedItem->getPromotionStartDate(),
                'redemption_end_date' => $promotionFeedItem->getPromotionEndDate(),
                'occasion' => $promotionFeedItem->getOccasion(),
                'language_code' => $promotionFeedItem->getLanguageCode(),
                'ad_schedule_targets' => $extensionFeedItem->getAdSchedules()
            ]),
            'tracking_url_template' => $promotionFeedItem->getTrackingUrlTemplate(),
            'url_custom_parameters' => $promotionFeedItem->getUrlCustomParameters(),
            'final_urls' => $promotionFeedItem->getFinalUrls(),
            'final_mobile_urls' => $promotionFeedItem->getFinalMobileUrls(),
            'final_url_suffix' => $promotionFeedItem->getFinalUrlSuffix(),
        ]);

        // Either percent off or money amount off must be set.
        if ($promotionFeedItem->getPercentOff() > 0) {
            // Adjust the percent off scale when copying.
            $asset->getPromotionAsset()->setPercentOff($promotionFeedItem->getPercentOff() / 100);
        } else {
            $money = new Money([
               'amount_micros' => $promotionFeedItem->getMoneyAmountOff()->getAmountMicros(),
               'currency_code' => $promotionFeedItem->getMoneyAmountOff()->getCurrencyCode()
            ]);
            $asset->getPromotionAsset()->setMoneyAmountOff($money);
        }

        // Either promotion code or orders over amount must be set.
        if (!empty($promotionFeedItem->getPromotionCode())) {
            $asset->getPromotionAsset()->setPromotionCode($promotionFeedItem->getPromotionCode());
        } else {
            $money = new Money([
                'amount_micros' => $promotionFeedItem->getOrdersOverAmount()->getAmountMicros(),
                'currency_code' => $promotionFeedItem->getOrdersOverAmount()->getCurrencyCode()
            ]);
            $asset->getPromotionAsset()->setOrdersOverAmount($money);
        }

        if ($extensionFeedItem->hasStartDateTime()) {
            $startDateTime = new \DateTime($extensionFeedItem->getStartDateTime());
            $asset->getPromotionAsset()->setStartDate($startDateTime->format('yyyy-MM-dd'));
        }
        if ($extensionFeedItem->hasEndDateTime()) {
            $endDateTime = new \DateTime($extensionFeedItem->getEndDateTime());
            $asset->getPromotionAsset()->setEndDate($endDateTime->format('yyyy-MM-dd'));
        }

        // Creates an operation to add the Promotion asset.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the Promotion asset and prints its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );
        $assetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created the Promotion asset with resource name: '%s'.%s",
            $assetResourceName,
            PHP_EOL
        );

        return $assetResourceName;
    }
    // [END migrate_promotion_feed_to_asset]

    /**
     * Associates the specified Promotion asset with the specified campaigns.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $promotionAssetResourceName the resource name of the Promotion asset
     * @param int[] $campaignIds the IDs of the campaigns with which assets should be associated
     */
    // [START migrate_promotion_feed_to_asset_2]
    private static function associateAssetWithCampaigns(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $promotionAssetResourceName,
        array $campaignIds
    ) {
        if (empty($campaignIds)) {
            print 'Asset was not associated with any campaigns.' . PHP_EOL;
            return;
        }
        $operations = [];
        foreach ($campaignIds as $campaignId) {
            $operations[] = new CampaignAssetOperation([
                'create' => new CampaignAsset([
                    'asset' => $promotionAssetResourceName,
                    'field_type' => AssetFieldType::PROMOTION,
                    'campaign' => ResourceNames::forCampaign($customerId, $campaignId)
                ])
            ]);
        }
        // Issues a mutate request to add the campaign assets and prints their information.
        $campaignAssetServiceClient = $googleAdsClient->getCampaignAssetServiceClient();
        $response = $campaignAssetServiceClient->mutateCampaignAssets(
            MutateCampaignAssetsRequest::build($customerId, $operations)
        );
        foreach ($response->getResults() as $addedCampaignAsset) {
            /** @var CampaignAsset $addedCampaignAsset */
            printf(
                "Created campaign asset with resource name: '%s'.%s",
                $addedCampaignAsset->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END migrate_promotion_feed_to_asset_2]

    /**
     * Associates the specified Promotion asset with the specified ad groups.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $promotionAssetResourceName the resource name of the Promotion asset
     * @param int[] $adGroupIds the IDs of the ad groups with which assets should be associated
     */
    private static function associateAssetWithAdGroups(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $promotionAssetResourceName,
        array $adGroupIds
    ) {
        if (empty($adGroupIds)) {
            print 'Asset was not associated with any ad groups.' . PHP_EOL;
            return;
        }
        $operations = [];
        foreach ($adGroupIds as $adGroupId) {
            $operations[] = new AdGroupAssetOperation([
                'create' => new AdGroupAsset([
                    'asset' => $promotionAssetResourceName,
                    'field_type' => AssetFieldType::PROMOTION,
                    'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
                ])
            ]);
        }
        // Issues a mutate request to add the ad group assets and prints their information.
        $adGroupAssetServiceClient = $googleAdsClient->getAdGroupAssetServiceClient();
        $response = $adGroupAssetServiceClient->mutateAdGroupAssets(
            MutateAdGroupAssetsRequest::build($customerId, $operations)
        );
        foreach ($response->getResults() as $addedAdGroupAsset) {
            /** @var AdGroupAsset $addedAdGroupAsset */
            printf(
                "Created ad group asset with resource name: '%s'.%s",
                $addedAdGroupAsset->getResourceName(),
                PHP_EOL
            );
        }
    }
}

MigratePromotionFeedToAsset::main();

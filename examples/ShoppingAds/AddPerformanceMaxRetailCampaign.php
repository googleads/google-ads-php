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

namespace Google\Ads\GoogleAds\Examples\ShoppingAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\ImageAsset;
use Google\Ads\GoogleAds\V18\Common\LanguageInfo;
use Google\Ads\GoogleAds\V18\Common\LocationInfo;
use Google\Ads\GoogleAds\V18\Common\MaximizeConversionValue;
use Google\Ads\GoogleAds\V18\Common\TextAsset;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Enums\AssetGroupStatusEnum\AssetGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\ConversionActionCategoryEnum\ConversionActionCategory;
use Google\Ads\GoogleAds\V18\Enums\ConversionOriginEnum\ConversionOrigin;
use Google\Ads\GoogleAds\V18\Enums\ListingGroupFilterListingSourceEnum\ListingGroupFilterListingSource;
use Google\Ads\GoogleAds\V18\Enums\ListingGroupFilterTypeEnum\ListingGroupFilterType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\AssetGroup;
use Google\Ads\GoogleAds\V18\Resources\AssetGroupAsset;
use Google\Ads\GoogleAds\V18\Resources\AssetGroupListingGroupFilter;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\Campaign\ShoppingSetting;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Resources\CampaignConversionGoal;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Services\AssetGroupAssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetGroupListingGroupFilterOperation;
use Google\Ads\GoogleAds\V18\Services\AssetGroupOperation;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignConversionGoalOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateOperation;
use Google\Ads\GoogleAds\V18\Services\MutateOperationResponse;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\Serializer;

/**
 * This example shows how to create a Performance Max retail campaign.
 *
 * This will be created for "All products".
 *
 * For more information about Performance Max retail campaigns, see
 * https://developers.google.com/google-ads/api/docs/performance-max/retail.
 *
 * Prerequisites:
 * - You need to have access to a Merchant Center account. You can find
 * instructions to create a Merchant Center account here:
 * https://support.google.com/merchants/answer/188924.
 * This account must be linked to your Google Ads account. The integration
 * instructions can be found at:
 * https://developers.google.com/google-ads/api/docs/shopping-ads/merchant-center
 * - You need your Google Ads account to track conversions. The different ways
 * to track conversions can be found here:
 * https://support.google.com/google-ads/answer/1722054.
 * - You must have at least one conversion action in the account. For more about conversion
 * actions, see
 * https://developers.google.com/google-ads/api/docs/conversions/overview#conversion_actions.
 */
class AddPerformanceMaxRetailCampaign
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const MERCHANT_CENTER_ACCOUNT_ID = 'INSERT_MERCHANT_CENTER_ACCOUNT_ID_HERE';
    private const SALES_COUNTRY = 'US';
    // The final URL for the generated ads. Must have the same domain as the Merchant Center
    // account.
    private const FINAL_URL = 'INSERT_FINAL_URL_HERE';

    // We specify temporary IDs that are specific to a single mutate request.
    // Temporary IDs are always negative and unique within one mutate request.
    //
    // See https://developers.google.com/google-ads/api/docs/mutating/best-practices
    // for further details.
    //
    // These temporary IDs are fixed because they are used in multiple places.
    private const BUDGET_TEMPORARY_ID = -1;
    private const PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID = -2;
    private const ASSET_GROUP_TEMPORARY_ID = -3;

    // There are also entities that will be created in the same request but do not need to be fixed
    // temporary IDs because they are referenced only once.
    /** @var int the negative temporary ID used in bulk mutates. */
    private static $nextTempId = self::ASSET_GROUP_TEMPORARY_ID - 1;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FINAL_URL => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID]
                    ?: self::MERCHANT_CENTER_ACCOUNT_ID,
                $options[ArgumentNames::SALES_COUNTRY] ?: self::SALES_COUNTRY,
                $options[ArgumentNames::FINAL_URL] ?: self::FINAL_URL
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
     * @param string $finalUrl the final URL for the asset group of the campaign
     */
    // [START add_performance_max_retail_campaign]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId,
        string $finalUrl
    ) {
        // [START add_performance_max_retail_campaign_1]
        // This campaign will override the customer conversion goals.
        // Retrieves the current list of customer conversion goals.
        $customerConversionGoals = self::getCustomerConversionGoals(
            $googleAdsClient,
            $customerId
        );

        // Performance Max campaigns require that repeated assets such as headlines
        // and descriptions be created before the campaign.
        // For the list of required assets for a Performance Max campaign, see
        // https://developers.google.com/google-ads/api/docs/performance-max/assets.
        //
        // Creates the headlines.
        $headlineAssetResourceNames = self::createMultipleTextAssets(
            $googleAdsClient,
            $customerId,
            ["Travel", "Travel Reviews", "Book travel"]
        );
        // Creates the descriptions.
        $descriptionAssetResourceNames = self::createMultipleTextAssets(
            $googleAdsClient,
            $customerId,
            ["Take to the air!", "Fly to the sky!"]
        );

        // It's important to create the below entities in this order because they depend on
        // each other.
        $operations = [];
        // The below methods create and return MutateOperations that we later
        // provide to the GoogleAdsService.Mutate method in order to create the
        // entities in a single request. Since the entities for a Performance Max
        // campaign are closely tied to one-another, it's considered a best practice
        // to create them in a single Mutate request so they all complete
        // successfully or fail entirely, leaving no orphaned entities. See:
        // https://developers.google.com/google-ads/api/docs/mutating/overview.
        $operations[] = self::createCampaignBudgetOperation($customerId);
        $operations[] = self::createPerformanceMaxCampaignOperation(
            $customerId,
            $merchantCenterAccountId
        );
        $operations =
            array_merge($operations, self::createCampaignCriterionOperations($customerId));
        $operations[] = self::createAssetGroupOperation($customerId, $finalUrl);
        $operations[] = self::createAssetGroupListingGroupFilterOperation($customerId);
        $operations = array_merge($operations, self::createAssetandAssetGroupAssetOperations(
            $customerId,
            $headlineAssetResourceNames,
            $descriptionAssetResourceNames
        ));
        $operations = array_merge($operations, self::createConversionGoalOperations(
            $customerId,
            $customerConversionGoals
        ));

        // Issues a mutate request to create everything and prints its information.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->mutate(
            MutateGoogleAdsRequest::build($customerId, $operations)
        );

        self::printResponseDetails($response);
        // [END add_performance_max_retail_campaign_1]
    }

    /**
     * Creates a MutateOperation that creates a new CampaignBudget.
     *
     * A temporary ID will be assigned to this campaign budget so that it can be
     * referenced by other objects being created in the same Mutate request.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation the mutate operation that creates a campaign budget
     */
    // [START add_performance_max_retail_campaign_2]
    private static function createCampaignBudgetOperation(int $customerId): MutateOperation
    {
        // Creates a mutate operation that creates a campaign budget operation.
        return new MutateOperation([
            'campaign_budget_operation' => new CampaignBudgetOperation([
                'create' => new CampaignBudget([
                    // Sets a temporary ID in the budget's resource name so it can be referenced
                    // by the campaign in later steps.
                    'resource_name' => ResourceNames::forCampaignBudget(
                        $customerId,
                        self::BUDGET_TEMPORARY_ID
                    ),
                    'name' => 'Performance Max retail campaign budget #' .
                        Helper::getPrintableDatetime(),
                    // The budget period already defaults to DAILY.
                    'amount_micros' => 50000000,
                    'delivery_method' => BudgetDeliveryMethod::STANDARD,
                    // A Performance Max campaign cannot use a shared campaign budget.
                    'explicitly_shared' => false
                ])
            ])
        ]);
    }
    // [END add_performance_max_retail_campaign_2]

    /**
     * Creates a MutateOperation that creates a new Performance Max campaign.
     *
     * A temporary ID will be assigned to this campaign so that it can
     * be referenced by other objects being created in the same Mutate request.
     *
     * @param int $customerId the customer ID
     * @param int $merchantCenterAccountId the Merchant Center account ID
     * @return MutateOperation the mutate operation that creates the campaign
     */
    // [START add_performance_max_retail_campaign_3]
    private static function createPerformanceMaxCampaignOperation(
        int $customerId,
        int $merchantCenterAccountId
    ): MutateOperation {
        // Creates a mutate operation that creates a campaign operation.
        return new MutateOperation([
            'campaign_operation' => new CampaignOperation([
                'create' => new Campaign([
                    'name' => 'Performance Max retail campaign #' . Helper::getPrintableDatetime(),
                    // Assigns the resource name with a temporary ID.
                    'resource_name' => ResourceNames::forCampaign(
                        $customerId,
                        self::PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID
                    ),
                    // Sets the budget using the given budget resource name.
                    'campaign_budget' => ResourceNames::forCampaignBudget(
                        $customerId,
                        self::BUDGET_TEMPORARY_ID
                    ),
                    // The campaign is the only entity in the mutate request that should have its
                    // status set.
                    // Recommendation: Set the campaign to PAUSED when creating it to prevent
                    // the ads from immediately serving.
                    'status' => CampaignStatus::PAUSED,
                    // All Performance Max campaigns have an advertising_channel_type of
                    // PERFORMANCE_MAX. The advertising_channel_sub_type should not be set.
                    'advertising_channel_type' => AdvertisingChannelType::PERFORMANCE_MAX,

                    // Bidding strategy must be set directly on the campaign.
                    // Setting a portfolio bidding strategy by resource name is not supported.
                    // Max Conversion and Max Conversion Value are the only strategies supported
                    // for Performance Max campaigns.
                    // An optional ROAS (Return on Advertising Spend) can be set for
                    // maximize_conversion_value. The ROAS value must be specified as a ratio in
                    // the API. It is calculated by dividing "total value" by "total spend".
                    // For more information on Max Conversion Value, see the support article:
                    // http://support.google.com/google-ads/answer/7684216.
                    // A target_roas of 3.5 corresponds to a 350% return on ad spend.
                    'maximize_conversion_value' => new MaximizeConversionValue([
                        'target_roas' => 3.5
                    ]),
                    // Below is what you would use if you want to maximize conversions
                    // You can optionally set the 'target_cpa_micros' field on MaximizeConversions.
                    // This is the average amount that you would like to spend per conversion
                    // action.
                    // 'maximize_conversions' => new MaximizeConversions(),

                    // Sets the Final URL expansion opt out. This flag is specific to
                    // Performance Max campaigns. If opted out (true), only the final URLs in
                    // the asset group or URLs specified in the advertiser's Google Merchant
                    // Center or business data feeds are targeted.
                    //
                    // If opted in (false), the entire domain will be targeted. For best
                    // results, set this value to false to opt in and allow URL expansions. You
                    // can optionally add exclusions to limit traffic to parts of your website.
                    //
                    // For a Retail campaign, we want the final URL's to be limited to those
                    // explicitly surfaced via GMC.
                    'url_expansion_opt_out' => true,

                    // Sets the shopping settings.
                    'shopping_setting' => new ShoppingSetting([
                        'merchant_id' => $merchantCenterAccountId,
                        // Optional: To use products only from a specific feed, set feed_label to
                        // the feed label used in Merchant Center.
                        // See: https://support.google.com/merchants/answer/12453549.
                        // Removing the feed_label field will use products from all feeds.
                        // 'feed_label' => 'INSERT_FEED_LABEL_HERE'
                    ]),

                    // Optional fields.
                    'start_date' => date('Ymd', strtotime('+1 day')),
                    'end_date' => date('Ymd', strtotime('+365 days'))
                ])
            ])
        ]);
    }
    // [END add_performance_max_retail_campaign_3]

    /**
     * Creates a list of MutateOperations that create new campaign criteria.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation[] a list of MutateOperations that create the new campaign criteria
     */
    // [START add_performance_max_retail_campaign_4]
    private static function createCampaignCriterionOperations(int $customerId): array
    {
        $operations = [];
        // Sets the LOCATION campaign criteria.
        // Target all of New York City except Brooklyn.
        // Location IDs are listed here:
        // https://developers.google.com/google-ads/api/reference/data/geotargets
        // and they can also be retrieved using the GeoTargetConstantService as shown
        // here: https://developers.google.com/google-ads/api/docs/targeting/location-targeting
        $operations[] = new MutateOperation([
            'campaign_criterion_operation' => new CampaignCriterionOperation([
                'create' => new CampaignCriterion([
                    'campaign' => ResourceNames::forCampaign(
                        $customerId,
                        self::PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID
                    ),
                    'location' => new LocationInfo([
                        // Adds one positive location target for New York City (ID=1023191),
                        // specifically adding the positive criteria before the negative one.
                        'geo_target_constant' => ResourceNames::forGeoTargetConstant(1023191)
                    ]),
                    'negative' => false
                ])
            ])
        ]);

        // Next adds the negative target for Brooklyn.
        $operations[] = new MutateOperation([
            'campaign_criterion_operation' => new CampaignCriterionOperation([
                'create' => new CampaignCriterion([
                    'campaign' => ResourceNames::forCampaign(
                        $customerId,
                        self::PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID
                    ),
                    'location' => new LocationInfo([
                        // Next add the negative target for Brooklyn (ID=1022762).
                        'geo_target_constant' => ResourceNames::forGeoTargetConstant(1022762)
                    ]),
                    'negative' => true
                ])
            ])
        ]);

        // Sets the LANGUAGE campaign criterion.
        $operations[] = new MutateOperation([
            'campaign_criterion_operation' => new CampaignCriterionOperation([
                'create' => new CampaignCriterion([
                    'campaign' => ResourceNames::forCampaign(
                        $customerId,
                        self::PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID
                    ),
                    // Sets the language.
                    // For a list of all language codes, see:
                    // https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-7
                    'language' => new LanguageInfo([
                        'language_constant' => ResourceNames::forLanguageConstant(1000)  // English
                    ])
                ])
            ])
        ]);

        return $operations;
    }
    // [END add_performance_max_retail_campaign_4]

    /**
     * Creates multiple text assets and returns the list of resource names.
     *
     * These repeated assets must be created in a separate request prior to creating the campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string[] $texts a list of strings, each of which will be used to create a text asset
     * @return string[] a list of asset resource names
     */
    // [START add_performance_max_retail_campaign_5]
    private static function createMultipleTextAssets(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $texts
    ): array {
        // Here again, we use the GoogleAdService to create multiple text assets in a single
        // request.
        $operations = [];
        foreach ($texts as $text) {
            // Creates a mutate operation for a text asset.
            $operations[] = new MutateOperation([
                'asset_operation' => new AssetOperation([
                    'create' => new Asset(['text_asset' => new TextAsset(['text' => $text])])
                ])
            ]);
        }

        // Issues a mutate request to add all assets.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        /** @var MutateGoogleAdsResponse $mutateGoogleAdsResponse */
        $mutateGoogleAdsResponse = $googleAdsServiceClient->mutate(
            MutateGoogleAdsRequest::build($customerId, $operations)
        );

        $assetResourceNames = [];
        foreach ($mutateGoogleAdsResponse->getMutateOperationResponses() as $response) {
            /** @var MutateOperationResponse $response */
            $assetResourceNames[] = $response->getAssetResult()->getResourceName();
        }
        self::printResponseDetails($mutateGoogleAdsResponse);

        return $assetResourceNames;
    }
    // [END add_performance_max_retail_campaign_5]

    /**
     * Creates a MutateOperation that creates a new asset group.
     *
     * A temporary ID will be assigned to this asset group so that it can
     * be referenced by other objects being created in the same Mutate request.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation a mutate operation creates a new asset group.
     */
    // [START add_performance_max_retail_campaign_10]
    private static function createAssetGroupOperation(
        int $customerId,
        string $finalUrl
    ): MutateOperation {
        // Creates a new mutate operation that creates an asset group operation.
        return new MutateOperation([
            'asset_group_operation' => new AssetGroupOperation([
                'create' => new AssetGroup([
                    'resource_name' => ResourceNames::forAssetGroup(
                        $customerId,
                        self::ASSET_GROUP_TEMPORARY_ID
                    ),
                    'name' => 'Performance Max retail asset group #' .
                        Helper::getPrintableDatetime(),
                    'campaign' => ResourceNames::forCampaign(
                        $customerId,
                        self::PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID
                    ),
                    'final_urls' => [$finalUrl],
                    'final_mobile_urls' => [$finalUrl],
                    'status' => AssetGroupStatus::PAUSED
                ])
            ])
        ]);
    }
    // [END add_performance_max_retail_campaign_10]

    /**
     * Creates a MutateOperation that creates a new asset group listing group filter.
     *
     * A temporary ID will be assigned to this listing group filter so that it can be referenced by
     * other objects being created in the same Mutate request.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation a MutateOperation that creates a new asset group listing group filter
     */
    // [START add_performance_max_retail_campaign_11]
    private static function createAssetGroupListingGroupFilterOperation(
        int $customerId
    ): MutateOperation {
        return new MutateOperation([
            'asset_group_listing_group_filter_operation'
            => new AssetGroupListingGroupFilterOperation([
                // Creates a new asset group listing group filter containing the "default"
                // listing group (All products).
                'create' => new AssetGroupListingGroupFilter([
                    'asset_group' => ResourceNames::forAssetGroup(
                        $customerId,
                        self::ASSET_GROUP_TEMPORARY_ID
                    ),
                    // Since this is the root node, do not set the 'parent_listing_group_filter'
                    // field. For all other nodes, this would refer to the parent listing group
                    // filter resource name.
                    //
                    // UNIT_INCLUDED means this node has no children.
                    'type' => ListingGroupFilterType::UNIT_INCLUDED,
                    // Because this is a Performance Max campaign for retail, we need to specify
                    // that this is in the shopping listing source.
                    'listing_source' => ListingGroupFilterListingSource::SHOPPING
                ])
            ])
        ]);
    }
    // [END add_performance_max_retail_campaign_11]

    /**
     * Creates a list of MutateOperations that create new asset group asset and assets.
     *
     * A temporary ID will be assigned to this asset group so that it can
     * be referenced by other objects being created in the same mutate request.
     *
     * @param int $customerId the customer ID
     * @param string[] $headlineAssetResourceNames a list of headline resource names
     * @param string[] $descriptionAssetResourceNames a list of description resource names
     * @return MutateOperation[] a list of MutateOperations that create new asset group assets and
     *     assets
     */
    // [START add_performance_max_retail_campaign_6]
    private static function createAssetandAssetGroupAssetOperations(
        int $customerId,
        array $headlineAssetResourceNames,
        array $descriptionAssetResourceNames
    ): array {
        $operations = [];
        // For the list of required assets for a Performance Max campaign, see
        // https://developers.google.com/google-ads/api/docs/performance-max/assets

        // An AssetGroup is linked to an Asset by creating a new AssetGroupAsset
        // and providing:
        // -  the resource name of the AssetGroup
        // -  the resource name of the Asset
        // -  the field_type of the Asset in this AssetGroup.
        //
        // To learn more about AssetGroups, see
        // https://developers.google.com/google-ads/api/docs/performance-max/asset-groups.

        // Links the previously created multiple text assets.

        // Links the headline assets.
        foreach ($headlineAssetResourceNames as $resourceName) {
            $operations[] = new MutateOperation([
                'asset_group_asset_operation' => new AssetGroupAssetOperation([
                    'create' => new AssetGroupAsset([
                        'asset' => $resourceName,
                        'asset_group' => ResourceNames::forAssetGroup(
                            $customerId,
                            self::ASSET_GROUP_TEMPORARY_ID
                        ),
                        'field_type' => AssetFieldType::HEADLINE
                    ])
                ])
            ]);
        }
        // Links the description assets.
        foreach ($descriptionAssetResourceNames as $resourceName) {
            $operations[] = new MutateOperation([
                'asset_group_asset_operation' => new AssetGroupAssetOperation([
                    'create' => new AssetGroupAsset([
                        'asset' => $resourceName,
                        'asset_group' => ResourceNames::forAssetGroup(
                            $customerId,
                            self::ASSET_GROUP_TEMPORARY_ID
                        ),
                        'field_type' => AssetFieldType::DESCRIPTION
                    ])
                ])
            ]);
        }

        // Creates and links the long headline text asset.
        $operations = array_merge($operations, self::createAndLinkTextAsset(
            $customerId,
            'Travel the World',
            AssetFieldType::LONG_HEADLINE
        ));
        // Creates and links the business name text asset.
        $operations = array_merge($operations, self::createAndLinkTextAsset(
            $customerId,
            'Interplanetary Cruises',
            AssetFieldType::BUSINESS_NAME
        ));

        // Creates and links the image assets.

        // Creates and links the Logo Asset.
        $operations = array_merge($operations, self::createAndLinkImageAsset(
            $customerId,
            'https://gaagl.page.link/1Crm',
            AssetFieldType::LOGO,
            'Marketing Logo'
        ));
        // Creates and links the Marketing Image Asset.
        $operations = array_merge($operations, self::createAndLinkImageAsset(
            $customerId,
            'https://gaagl.page.link/Eit5',
            AssetFieldType::MARKETING_IMAGE,
            'Marketing Image'
        ));
        // Creates and links the Square Marketing Image Asset.
        $operations = array_merge($operations, self::createAndLinkImageAsset(
            $customerId,
            'https://gaagl.page.link/bjYi',
            AssetFieldType::SQUARE_MARKETING_IMAGE,
            'Square Marketing Image'
        ));

        // After being created the list must be sorted so that all asset operations come before all
        // the asset group asset operations, otherwise the API will reject the request.
        return self::sortAssetAndAssetGroupAssetOperations($operations);
    }
    // [END add_performance_max_retail_campaign_6]

    /**
     * Creates a list of MutateOperations that create a new linked text asset.
     *
     * @param int $customerId the customer ID
     * @param string $text the text of the asset to be created
     * @param int $fieldType the field type of the new asset in the AssetGroupAsset
     * @return MutateOperation[] a list of MutateOperations that create a new linked text asset
     */
    // [START add_performance_max_retail_campaign_7]
    private static function createAndLinkTextAsset(
        int $customerId,
        string $text,
        int $fieldType
    ): array {
        $operations = [];
        // Creates a new mutate operation that creates a text asset.
        $operations[] = new MutateOperation([
            'asset_operation' => new AssetOperation([
                'create' => new Asset([
                    'resource_name' => ResourceNames::forAsset($customerId, self::$nextTempId),
                    'text_asset' => new TextAsset(['text' => $text])
                ])
            ])
        ]);

        // Creates an asset group asset to link the asset to the asset group.
        $operations[] = new MutateOperation([
            'asset_group_asset_operation' => new AssetGroupAssetOperation([
                'create' => new AssetGroupAsset([
                    'asset' => ResourceNames::forAsset($customerId, self::$nextTempId),
                    'asset_group' => ResourceNames::forAssetGroup(
                        $customerId,
                        self::ASSET_GROUP_TEMPORARY_ID
                    ),
                    'field_type' => $fieldType
                ])
            ])
        ]);
        self::$nextTempId--;

        return $operations;
    }
    // [END add_performance_max_retail_campaign_7]

    /**
     * Creates a list of MutateOperations that create a new linked image asset.
     *
     * @param int $customerId the customer ID
     * @param string $url the URL of the image to be retrieved and put into an asset
     * @param int $fieldType the field type of the new asset in the AssetGroupAsset
     * @param string $assetName the asset name
     * @return MutateOperation[] a list of MutateOperations that create a new linked image asset
     */
    // [START add_performance_max_retail_campaign_8]
    private static function createAndLinkImageAsset(
        int $customerId,
        string $url,
        int $fieldType,
        string $assetName
    ): array {
        $operations = [];
        // Creates a new mutate operation that creates an image asset.
        $operations[] = new MutateOperation([
            'asset_operation' => new AssetOperation([
                'create' => new Asset([
                    'resource_name' => ResourceNames::forAsset($customerId, self::$nextTempId),
                    // Provide a unique friendly name to identify your asset.
                    // When there is an existing image asset with the same content but a different
                    // name, the new name will be dropped silently.
                    'name' => $assetName,
                    'image_asset' => new ImageAsset(['data' => file_get_contents($url)])
                ])
            ])
        ]);

        // Creates an asset group asset to link the asset to the asset group.
        $operations[] = new MutateOperation([
            'asset_group_asset_operation' => new AssetGroupAssetOperation([
                'create' => new AssetGroupAsset([
                    'asset' => ResourceNames::forAsset($customerId, self::$nextTempId),
                    'asset_group' => ResourceNames::forAssetGroup(
                        $customerId,
                        self::ASSET_GROUP_TEMPORARY_ID
                    ),
                    'field_type' => $fieldType
                ])
            ])
        ]);
        self::$nextTempId--;

        return $operations;
    }
    // [END add_performance_max_retail_campaign_8]

    /**
     * Sorts a list of asset and asset group asset operations. This sorts the list such that all
     * asset operations precede all asset group asset operations. If asset group assets are created
     * before assets then an error will be returned by the API.
     *
     * @param MutateOperation[] $operations a list of asset and asset group asset mutate operations
     * @return MutateOperation[] a sorted list of asset and asset group asset mutate operations
     */
    // [START add_performance_max_retail_campaign_12]
    private static function sortAssetAndAssetGroupAssetOperations(array $operations): array
    {
        usort(
            $operations,
            function (MutateOperation $operation1, MutateOperation $operation2) {
                if (!is_null($operation1->getAssetOperation())) {
                    return -1;
                } elseif (!is_null($operation1->getAssetOperation())) {
                    return 0;
                } else {
                    return 1;
                }
            }
        );
        return $operations;
    }
    // [END add_performance_max_retail_campaign_12]


    /**
     * Retrieves the list of customer conversion goals.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return array list of dicts containing the category and origin of customer conversion goals
     */
    // [START add_performance_max_retail_campaign_9]
    private static function getCustomerConversionGoals(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): array {
        $customerConversionGoals = [];
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all customer conversion goals.
        $query = 'SELECT customer_conversion_goal.category, customer_conversion_goal.origin ' .
            'FROM customer_conversion_goal';
        // The number of conversion goals is typically less than 50 so we use a search request
        // instead of search stream.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and builds the list of conversion goals.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $customerConversionGoals[] = [
                'category' => $googleAdsRow->getCustomerConversionGoal()->getCategory(),
                'origin' => $googleAdsRow->getCustomerConversionGoal()->getOrigin()
            ];
        }

        return $customerConversionGoals;
    }

    /**
     * Creates a list of MutateOperations that override customer conversion goals.
     *
     * @param int $customerId the customer ID
     * @param array $customerConversionGoals the list of customer conversion goals that will be
     *      overridden
     * @return MutateOperation[] a list of MutateOperations that update campaign conversion goals
     */
    private static function createConversionGoalOperations(
        int $customerId,
        array $customerConversionGoals
    ): array {
        $operations = [];

        // To override the customer conversion goals, we will change the biddability of each of the
        // customer conversion goals so that only the desired conversion goal is biddable in this
        // campaign.
        foreach ($customerConversionGoals as $customerConversionGoal) {
            $campaignConversionGoal = new CampaignConversionGoal([
                'resource_name' => ResourceNames::forCampaignConversionGoal(
                    $customerId,
                    self::PERFORMANCE_MAX_CAMPAIGN_TEMPORARY_ID,
                    ConversionActionCategory::name($customerConversionGoal['category']),
                    ConversionOrigin::name($customerConversionGoal['origin'])
                )
            ]);
            // Changes the biddability for the campaign conversion goal.
            // Sets biddability to true for the desired (category, origin).
            // Sets biddability to false for all other conversion goals.
            // Note:
            //  1- It is assumed that this Conversion Action
            //     (category=PURCHASE, origin=WEBSITE) exists in this account.
            //  2- More than one goal can be biddable if desired. This example
            //     shows only one.
            if (
                $customerConversionGoal["category"] === ConversionActionCategory::PURCHASE
                && $customerConversionGoal["origin"] === ConversionOrigin::WEBSITE
            ) {
                $campaignConversionGoal->setBiddable(true);
            } else {
                $campaignConversionGoal->setBiddable(false);
            }

            $operations[] = new MutateOperation([
                'campaign_conversion_goal_operation' => new CampaignConversionGoalOperation([
                    'update' => $campaignConversionGoal,
                    // Sets the update mask on the operation. Here the update mask will be a list
                    // of all the fields that were set on the update object.
                    'update_mask' => FieldMasks::allSetFieldsOf($campaignConversionGoal)
                ])
            ]);
        }

        return $operations;
    }
    // [END add_performance_max_retail_campaign_9]

    /**
     * Prints the details of a MutateGoogleAdsResponse. Parses the "response" oneof field name and
     * uses it to extract the new entity's name and resource name.
     *
     * @param MutateGoogleAdsResponse $mutateGoogleAdsResponse the mutate Google Ads response
     */
    private static function printResponseDetails(
        MutateGoogleAdsResponse $mutateGoogleAdsResponse
    ): void {
        foreach ($mutateGoogleAdsResponse->getMutateOperationResponses() as $response) {
            /** @var MutateOperationResponse $response */
            $getter = Serializer::getGetter($response->getResponse());
            printf(
                "Created a(n) %s with '%s'.%s",
                preg_replace(
                    '/Result$/',
                    '',
                    ucfirst(Serializer::toCamelCase($response->getResponse()))
                ),
                $response->$getter()->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END add_performance_max_retail_campaign]
}

AddPerformanceMaxRetailCampaign::main();

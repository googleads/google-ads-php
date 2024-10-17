<?php

/**
 * Copyright 2023 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\Travel;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\CallToActionAsset;
use Google\Ads\GoogleAds\V18\Common\HotelPropertyAsset;
use Google\Ads\GoogleAds\V18\Common\ImageAsset;
use Google\Ads\GoogleAds\V18\Common\MaximizeConversionValue;
use Google\Ads\GoogleAds\V18\Common\TextAsset;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Enums\AssetGroupStatusEnum\AssetGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\AssetSetTypeEnum\AssetSetType;
use Google\Ads\GoogleAds\V18\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\HotelAssetSuggestionStatusEnum\HotelAssetSuggestionStatus;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\AssetGroup;
use Google\Ads\GoogleAds\V18\Resources\AssetGroupAsset;
use Google\Ads\GoogleAds\V18\Resources\AssetSet;
use Google\Ads\GoogleAds\V18\Resources\AssetSetAsset;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Services\AssetGroupAssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetGroupOperation;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetSetAssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetSetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\HotelAssetSuggestion;
use Google\Ads\GoogleAds\V18\Services\HotelImageAsset;
use Google\Ads\GoogleAds\V18\Services\HotelTextAsset;
use Google\Ads\GoogleAds\V18\Services\MutateAssetSetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateOperation;
use Google\Ads\GoogleAds\V18\Services\MutateOperationResponse;
use Google\Ads\GoogleAds\V18\Services\SuggestTravelAssetsRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\Serializer;

/**
 * This example shows how to create a Performance Max for travel goals campaign. It also uses
 * TravelAssetSuggestionService to fetch suggested assets for creating an asset group. In case
 * there are not enough assets for the asset group (required by Performance Max), this example will
 * create more assets to fulfill the requirements.
 *
 * For more information about Performance Max campaigns, see
 * https://developers.google.com/google-ads/api/docs/performance-max/overview.
 *
 * Prerequisites:
 * - You must have at least one conversion action in the account. For more about conversion actions,
 * see
 * https://developers.google.com/google-ads/api/docs/conversions/overview#conversion_actions.
 *
 * Notes:
 * - This example uses the default customer conversion goals. For an example of setting
 *   campaign-specific conversion goals, see ShoppingAds/AddPerformanceMaxRetailCampaign.php.
 * - To learn how to create asset group signals, see
 *   AdvancedOperations/AddPerformanceMaxCampaign.php.
 */
class AddPerformanceMaxForTravelGoalsCampaign
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Sets a place ID that uniquely identifies a place in the Google Places database.
    // See https://developers.google.com/places/web-service/place-id to learn more.
    // The provided place ID must belong to a hotel property.
    private const PLACE_ID = 'INSERT_PLACE_ID_HERE';

    // Minimum requirements of assets required in a Performance Max asset group.
    // See https://developers.google.com/google-ads/api/docs/performance-max/assets for details.
    private const MIN_REQUIRED_TEXT_ASSET_COUNTS = [
        AssetFieldType::HEADLINE => 3,
        AssetFieldType::LONG_HEADLINE => 1,
        AssetFieldType::DESCRIPTION => 2,
        AssetFieldType::BUSINESS_NAME => 1
    ];
    private const MIN_REQUIRED_IMAGE_ASSET_COUNTS = [
        AssetFieldType::MARKETING_IMAGE => 1,
        AssetFieldType::SQUARE_MARKETING_IMAGE => 1,
        AssetFieldType::LOGO => 1
    ];
    // Texts and URLs used to create text and image assets when the TravelAssetSuggestionService
    // doesn't return enough assets required for creating an asset group.
    private const DEFAULT_TEXT_ASSETS_INFO = [
        AssetFieldType::HEADLINE => ['Hotel', 'Travel Reviews', 'Book travel'],
        AssetFieldType::LONG_HEADLINE => ['Travel the World'],
        AssetFieldType::DESCRIPTION => [
            'Great deal for your beloved hotel',
            'Best rate guaranteed'
        ],
        AssetFieldType::BUSINESS_NAME => ['Interplanetary Cruises']
    ];
    private const DEFAULT_IMAGE_ASSETS_INFO = [
        AssetFieldType::MARKETING_IMAGE => ['https://gaagl.page.link/Eit5'],
        AssetFieldType::SQUARE_MARKETING_IMAGE => ['https://gaagl.page.link/bjYi'],
        AssetFieldType::LOGO => ['https://gaagl.page.link/bjYi']
    ];

    // We specify temporary IDs that are specific to a single mutate request.
    // Temporary IDs are always negative and unique within one mutate request.
    //
    // See https://developers.google.com/google-ads/api/docs/mutating/best-practices
    // for further details.
    //
    // These temporary IDs are fixed because they are used in multiple places.
    private const ASSET_TEMPORARY_ID = -1;
    private const BUDGET_TEMPORARY_ID = -2;
    private const CAMPAIGN_TEMPORARY_ID = -3;
    private const ASSET_GROUP_TEMPORARY_ID = -4;

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
            ArgumentNames::PLACE_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::PLACE_ID] ?: self::PLACE_ID
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
     * @param string $placeId the place ID for a hotel property asset
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $placeId
    ) {
        // Gets hotel asset suggestion using the TravelAssetSuggestionService.
        $hotelAssetSuggestion =
            self::getHotelAssetSuggestion($googleAdsClient, $customerId, $placeId);

        // Performance Max campaigns require that repeated assets such as headlines
        // and descriptions be created before the campaign.
        // For the list of required assets for a Performance Max campaign, see
        // https://developers.google.com/google-ads/api/docs/performance-max/assets.
        //
        // This step is the same for any types of Performance Max campaigns.

        // Creates the headlines using the hotel asset suggestion.
        $headlineAssetResourceNames = self::createMultipleTextAssets(
            $googleAdsClient,
            $customerId,
            AssetFieldType::HEADLINE,
            $hotelAssetSuggestion
        );
        // Creates the descriptions using the hotel asset suggestion.
        $descriptionAssetResourceNames = self::createMultipleTextAssets(
            $googleAdsClient,
            $customerId,
            AssetFieldType::DESCRIPTION,
            $hotelAssetSuggestion
        );

        // Creates a hotel property asset set, which will be used later to link with a newly created
        // campaign.
        $hotelPropertyAssetSetResourceName =
            self::createHotelAssetSet($googleAdsClient, $customerId);
        // Creates a hotel property asset and link it with the previously created hotel property
        // asset set. This asset will also be linked to an asset group in the later steps.
        // In the real-world scenario, you'd need to create many assets for all your hotel
        // properties. We use one hotel property here for simplicity.
        // Both asset and asset set need to be created before creating a campaign, so we cannot
        // bundle them with other mutate operations below.
        $hotelPropertyAssetResourceName = self::createHotelAsset(
            $googleAdsClient,
            $customerId,
            $placeId,
            $hotelPropertyAssetSetResourceName
        );

        // It's important to create the below entities in this order because they depend on
        // each other.
        // The below methods create and return mutate operations that we later provide to the
        // GoogleAdsService.Mutate method in order to create the entities in a single request.
        // Since the entities for a Performance Max campaign are closely tied to one-another, it's
        // considered a best practice to create them in a single Mutate request so they all complete
        // successfully or fail entirely, leaving no orphaned entities. See:
        // https://developers.google.com/google-ads/api/docs/mutating/overview.
        $operations = [];
        $operations[] = self::createCampaignBudgetOperation($customerId);
        $operations[] =
            self::createCampaignOperation($customerId, $hotelPropertyAssetSetResourceName);
        $operations = array_merge($operations, self::createAssetGroupOperations(
            $customerId,
            $hotelPropertyAssetResourceName,
            $headlineAssetResourceNames,
            $descriptionAssetResourceNames,
            $hotelAssetSuggestion
        ));

        // Issues a mutate request to create everything and prints the results.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->mutate(
            MutateGoogleAdsRequest::build($customerId, $operations)
        );
        print "Created the following entities for a campaign budget, a campaign, and an asset group"
            . " for Performance Max for travel goals:" . PHP_EOL;
        self::printResponseDetails($response);
    }

    /**
     * Returns hotel asset suggestion obtained from TravelAssetsSuggestionService.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $placeId the place ID of the hotel property you want to get its suggested
     *     assets
     * @return HotelAssetSuggestion a hotel asset suggestion
     */
    // [START get_hotel_asset_suggestion]
    private static function getHotelAssetSuggestion(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $placeId
    ): HotelAssetSuggestion {
        // Send a request to suggest assets to be created as an asset group for the Performance Max
        // for travel goals campaign.
        $travelAssetSuggestionServiceClient =
            $googleAdsClient->getTravelAssetSuggestionServiceClient();
        // Uses 'en-US' as an example. It can be any language specifications in BCP 47 format.
        $request = SuggestTravelAssetsRequest::build($customerId, 'en-US');
        // The service accepts several place IDs. We use only one here for demonstration.
        $request->setPlaceIds([$placeId]);
        $response = $travelAssetSuggestionServiceClient->suggestTravelAssets($request);
        printf("Fetched a hotel asset suggestion for the place ID '%s'.%s", $placeId, PHP_EOL);
        return $response->getHotelAssetSuggestions()[0];
    }
    // [END get_hotel_asset_suggestion]

    /**
     * Creates multiple text assets and returns the list of resource names. The hotel asset
     * suggestion is used to create a text asset first. If the number of created text assets is
     * still fewer than the minimum required number of assets of the specified asset field type,
     * adds more text assets to fulfill the requirement.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $assetFieldType the asset field type that this text assets will be created for
     * @param HotelAssetSuggestion $hotelAssetSuggestion the hotel asset suggestion
     * @return string[] a list of asset resource names
     */
    private static function createMultipleTextAssets(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $assetFieldType,
        HotelAssetSuggestion $hotelAssetSuggestion
    ): array {
        // We use the GoogleAdService to create multiple text assets in a single request.
        // First, adds all the text assets of the specified asset field type.
        $operations = [];
        $numOperationsAdded = 0;
        if ($hotelAssetSuggestion->getStatus() === HotelAssetSuggestionStatus::SUCCESS) {
            foreach ($hotelAssetSuggestion->getTextAssets() as $textAsset) {
                /** @var HotelTextAsset $textAsset */
                if ($textAsset->getAssetFieldType() !== $assetFieldType) {
                    continue;
                }
                $operations[] = new MutateOperation([
                    'asset_operation' => new AssetOperation([
                        'create' => new Asset([
                            'text_asset' => new TextAsset(['text' => $textAsset->getText()])
                        ])
                    ])
                ]);
                $numOperationsAdded++;
            }
        }
        // If the added assets are still less than the minimum required assets for the asset field
        // type, add more text assets using the default texts.
        if ($numOperationsAdded < self::MIN_REQUIRED_TEXT_ASSET_COUNTS[$assetFieldType]) {
            for (
                $i = 0;
                $i < self::MIN_REQUIRED_TEXT_ASSET_COUNTS[$assetFieldType] - $numOperationsAdded;
                $i++
            ) {
                // Creates a mutate operation for a text asset.
                $operations[] = new MutateOperation([
                    'asset_operation' => new AssetOperation([
                        'create' => new Asset([
                            'text_asset' => new TextAsset([
                                'text' => self::DEFAULT_TEXT_ASSETS_INFO[$assetFieldType][$i]
                            ])
                        ])
                    ])
                ]);
            }
        }

        // Issues a mutate request to add all assets.
        $googleAdsService = $googleAdsClient->getGoogleAdsServiceClient();
        /** @var MutateGoogleAdsResponse $mutateGoogleAdsResponse */
        $mutateGoogleAdsResponse =
            $googleAdsService->mutate(MutateGoogleAdsRequest::build($customerId, $operations));

        $assetResourceNames = [];
        foreach ($mutateGoogleAdsResponse->getMutateOperationResponses() as $response) {
            /** @var MutateOperationResponse $response */
            $assetResourceNames[] = $response->getAssetResult()->getResourceName();
        }
        printf(
            "The following assets are created for the asset field type '%s':%s",
            AssetFieldType::name($assetFieldType),
            PHP_EOL
        );
        self::printResponseDetails($mutateGoogleAdsResponse);

        return $assetResourceNames;
    }

    /**
     * Creates a hotel property asset set.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the created hotel property asset set resource name
     */
    // [START create_hotel_asset_set]
    private static function createHotelAssetSet(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): string {
        // Creates an asset set operation for a hotel property asset set.
        $assetSetOperation = new AssetSetOperation([
            // Creates a hotel property asset set.
            'create' => new AssetSet([
                'name' => 'My Hotel propery asset set #' . Helper::getPrintableDatetime(),
                'type' => AssetSetType::HOTEL_PROPERTY
            ])
        ]);

        // Issues a mutate request to add a hotel asset set and prints its information.
        $assetSetServiceClient = $googleAdsClient->getAssetSetServiceClient();
        $response = $assetSetServiceClient->mutateAssetSets(
            MutateAssetSetsRequest::build($customerId, [$assetSetOperation])
        );
        $assetSetResourceName = $response->getResults()[0]->getResourceName();
        printf("Created an asset set with resource name: '%s'.%s", $assetSetResourceName, PHP_EOL);
        return $assetSetResourceName;
    }
    // [END create_hotel_asset_set]

    /**
     * Creates a hotel property asset using the specified place ID. The place ID must belong to
     * a hotel property. Then, links it to the specified asset set.
     *
     * See https://developers.google.com/places/web-service/place-id to search for a hotel place ID.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $placeId the place ID for a hotel
     * @param string $assetSetResourceName the asset set resource name
     * @return string the created hotel property asset resource name
     */
    // [START create_hotel_asset]
    private static function createHotelAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $placeId,
        string $assetSetResourceName
    ): string {
        // We use the GoogleAdService to create an asset and asset set asset in a single
        // request.
        $operations = [];
        $assetResourceName =
            ResourceNames::forAsset($customerId, self::ASSET_TEMPORARY_ID);
        // Creates a mutate operation for a hotel property asset.
        $operations[] = new MutateOperation([
            'asset_operation' => new AssetOperation([
                // Creates a hotel property asset.
                'create' => new Asset([
                    'resource_name' => $assetResourceName,
                    // Creates a hotel property asset for the place ID.
                    'hotel_property_asset' => new HotelPropertyAsset(['place_id' => $placeId]),
                ])
            ])
        ]);
        // Creates a mutate operation for an asset set asset.
        $operations[] = new MutateOperation([
            'asset_set_asset_operation' => new AssetSetAssetOperation([
                // Creates an asset set asset.
                'create' => new AssetSetAsset([
                    'asset' => $assetResourceName,
                    'asset_set' => $assetSetResourceName
                ])
            ])
        ]);

        // Issues a mutate request to create all entities.
        $googleAdsService = $googleAdsClient->getGoogleAdsServiceClient();
        /** @var MutateGoogleAdsResponse $mutateGoogleAdsResponse */
        $mutateGoogleAdsResponse =
            $googleAdsService->mutate(MutateGoogleAdsRequest::build($customerId, $operations));
        print "Created the following entities for the hotel asset:" . PHP_EOL;
        self::printResponseDetails($mutateGoogleAdsResponse);

        // Returns the created asset resource name, which will be used later to create an asset
        // group. Other resource names are not used later.
        return $mutateGoogleAdsResponse->getMutateOperationResponses()[0]->getAssetResult()
            ->getResourceName();
    }
    // [END create_hotel_asset]

    /**
     * Creates a mutate operation that creates a new campaign budget.
     *
     * A temporary ID will be assigned to this campaign budget so that it can be
     * referenced by other objects being created in the same mutate request.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation the mutate operation that creates a campaign budget
     */
    private static function createCampaignBudgetOperation(int $customerId): MutateOperation
    {
        // Creates a mutate operation that creates a campaign budget.
        return new MutateOperation([
            'campaign_budget_operation' => new CampaignBudgetOperation([
                'create' => new CampaignBudget([
                    // Sets a temporary ID in the budget's resource name so it can be referenced
                    // by the campaign in later steps.
                    'resource_name' => ResourceNames::forCampaignBudget(
                        $customerId,
                        self::BUDGET_TEMPORARY_ID
                    ),
                    'name' => 'Performance Max for travel goals campaign budget #'
                        . Helper::getPrintableDatetime(),
                    // The budget period already defaults to DAILY.
                    'amount_micros' => 50000000,
                    'delivery_method' => BudgetDeliveryMethod::STANDARD,
                    // A Performance Max campaign cannot use a shared campaign budget.
                    'explicitly_shared' => false
                ])
            ])
        ]);
    }

    /**
     * Creates a mutate operation that creates a new Performance Max campaign. Links the specified
     * hotel property asset set to this campaign.
     *
     * A temporary ID will be assigned to this campaign so that it can be referenced by other
     * objects being created in the same mutate request.
     *
     * @param int $customerId the customer ID
     * @param string $hotelPropertyAssetSetResourceName the asset set resource name
     * @return MutateOperation the mutate operation that creates the campaign
     */
    // [START create_campaign]
    private static function createCampaignOperation(
        int $customerId,
        string $hotelPropertyAssetSetResourceName
    ): MutateOperation {
        // Creates a mutate operation that creates a campaign.
        return new MutateOperation([
            'campaign_operation' => new CampaignOperation([
                'create' => new Campaign([
                    'name' => 'Performance Max for travel goals campaign #'
                        . Helper::getPrintableDatetime(),
                    // Assigns the resource name with a temporary ID.
                    'resource_name' => ResourceNames::forCampaign(
                        $customerId,
                        self::CAMPAIGN_TEMPORARY_ID
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
                    // Performance Max campaigns have an advertising_channel_type of
                    // PERFORMANCE_MAX. The advertising_channel_sub_type should not be set.
                    'advertising_channel_type' => AdvertisingChannelType::PERFORMANCE_MAX,

                    // To create a Performance Max for travel goals campaign, you need to set
                    // `hotel_property_asset_set`.
                    'hotel_property_asset_set' => $hotelPropertyAssetSetResourceName,

                    // Bidding strategy must be set directly on the campaign.
                    // Setting a portfolio bidding strategy by resource name is not supported.
                    // Max Conversion and Maximize Conversion Value are the only strategies
                    // supported for Performance Max campaigns.
                    // An optional ROAS (Return on Advertising Spend) can be set for
                    // maximize_conversion_value. The ROAS value must be specified as a ratio in
                    // the API. It is calculated by dividing "total value" by "total spend".
                    // For more information on Maximize Conversion Value, see the support
                    // article: https://support.google.com/google-ads/answer/7684216.
                    // A target_roas of 3.5 corresponds to a 350% return on ad spend.
                    'maximize_conversion_value' => new MaximizeConversionValue([
                        'target_roas' => 3.5
                    ])
                ])
            ])
        ]);
    }
    // [END create_campaign]

    /**
     * Creates a list of mutate operations that create a new asset group, composed of suggested
     * assets. In case the number of suggested assets is not enough for the requirements, it'll
     * create more assets to meet the requirement.
     *
     * For the list of required assets for a Performance Max campaign, see
     * https://developers.google.com/google-ads/api/docs/performance-max/assets.
     *
     * @param int $customerId the customer ID
     * @param string $hotelPropertyAssetResourceName the hotel property asset resource name that
     *     will be used to create an asset group
     * @param string[] $headlineAssetResourceNames a list of headline resource names
     * @param string[] $descriptionAssetResourceNames a list of description resource names
     * @param HotelAssetSuggestion $hotelAssetSuggestion the hotel asset suggestion
     * @return MutateOperation[] a list of mutate operations that create the asset group
     */
    private static function createAssetGroupOperations(
        int $customerId,
        string $hotelPropertyAssetResourceName,
        array $headlineAssetResourceNames,
        array $descriptionAssetResourceNames,
        HotelAssetSuggestion $hotelAssetSuggestion
    ): array {
        $operations = [];

        // Creates a new mutate operation that creates an asset group using suggested information
        // when available.
        $assetGroupName = $hotelAssetSuggestion->getStatus() === HotelAssetSuggestionStatus::SUCCESS
            ? $hotelAssetSuggestion->getHotelName()
            : 'Performance Max for travel goals asset group #' . Helper::getPrintableDatetime();
        $assetGroupFinalUrls =
            $hotelAssetSuggestion->getStatus() === HotelAssetSuggestionStatus::SUCCESS
                ? [$hotelAssetSuggestion->getFinalUrl()] : ['http://www.example.com'];
        $assetGroupResourceName =
            ResourceNames::forAssetGroup($customerId, self::ASSET_GROUP_TEMPORARY_ID);
        $operations[] = new MutateOperation([
            'asset_group_operation' => new AssetGroupOperation([
                'create' => new AssetGroup([
                    'resource_name' => $assetGroupResourceName,
                    'name' => $assetGroupName,
                    'campaign' => ResourceNames::forCampaign(
                        $customerId,
                        self::CAMPAIGN_TEMPORARY_ID
                    ),
                    'final_urls' => $assetGroupFinalUrls,
                    'status' => AssetGroupStatus::PAUSED
                ])
            ])
        ]);

        // An asset group is linked to an asset by creating a new asset group asset
        // and providing:
        // -  the resource name of the asset group
        // -  the resource name of the asset
        // -  the field_type of the asset in this asset group
        //
        // To learn more about asset groups, see
        // https://developers.google.com/google-ads/api/docs/performance-max/asset-groups.

        // Headline and description assets were created at the first step of this example. So, we
        // just need to link them with the created asset group.

        // Links the headline assets to the asset group.
        foreach ($headlineAssetResourceNames as $resourceName) {
            $operations[] = new MutateOperation([
                'asset_group_asset_operation' => new AssetGroupAssetOperation([
                    'create' => new AssetGroupAsset([
                        'asset' => $resourceName,
                        'asset_group' => $assetGroupResourceName,
                        'field_type' => AssetFieldType::HEADLINE
                    ])
                ])
            ]);
        }
        // Links the description assets to the asset group.
        foreach ($descriptionAssetResourceNames as $resourceName) {
            $operations[] = new MutateOperation([
                'asset_group_asset_operation' => new AssetGroupAssetOperation([
                    'create' => new AssetGroupAsset([
                        'asset' => $resourceName,
                        'asset_group' => $assetGroupResourceName,
                        'field_type' => AssetFieldType::DESCRIPTION
                    ])
                ])
            ]);
        }

        // [START link_hotel_asset]
        // Link the previously created hotel property asset to the asset group. In the real-world
        // scenario, you'd need to do this step several times for each hotel property asset.
        $operations[] = new MutateOperation([
            'asset_group_asset_operation' => new AssetGroupAssetOperation([
                'create' => new AssetGroupAsset([
                    'asset' => $hotelPropertyAssetResourceName,
                    'asset_group' => $assetGroupResourceName,
                    'field_type' => AssetFieldType::HOTEL_PROPERTY
                ])
            ])
        ]);
        // [END link_hotel_asset]

        // Creates the rest of required text assets and link them to the asset group.
        $operations = array_merge(
            $operations,
            self::createTextAssetsForAssetGroup($customerId, $hotelAssetSuggestion)
        );
        // Creates the image assets and link them to the asset group. Some optional image assets
        // suggested by the TravelAssetSuggestionService might be created too.
        $operations = array_merge(
            $operations,
            self::createImageAssetsForAssetGroup($customerId, $hotelAssetSuggestion)
        );

        if ($hotelAssetSuggestion->getStatus() === HotelAssetSuggestionStatus::SUCCESS) {
            // Creates a new mutate operation for a suggested call-to-action asset and link it
            // to the asset group.
            $operations[] = new MutateOperation([
                'asset_operation' => new AssetOperation([
                    'create' => new Asset([
                        'resource_name' => ResourceNames::forAsset($customerId, self::$nextTempId),
                        'name' => 'Suggested call-to-action asset #'
                            . Helper::getShortPrintableDatetime(),
                        'call_to_action_asset' => new CallToActionAsset([
                            'call_to_action' => $hotelAssetSuggestion->getCallToAction()
                        ])
                    ])
                ])
            ]);
            $operations[] = new MutateOperation([
                'asset_group_asset_operation' => new AssetGroupAssetOperation([
                    'create' => new AssetGroupAsset([
                        'asset' => ResourceNames::forAsset($customerId, self::$nextTempId),
                        'asset_group' => $assetGroupResourceName,
                        'field_type' => AssetFieldType::CALL_TO_ACTION_SELECTION
                    ])
                ])
            ]);
            self::$nextTempId--;
        }

        return $operations;
    }

    /**
     * Creates text assets required for an asset group using the suggested hotel text assets. It
     * adds more text assets to fulfill the requirements if the suggested hotel text assets are not
     * enough.
     *
     * @param int $customerId the customer ID
     * @param HotelAssetSuggestion $hotelAssetSuggestion the hotel asset suggestion
     * @return MutateOperation[] a list of mutate operations that create text assets
     */
    private static function createTextAssetsForAssetGroup(
        int $customerId,
        HotelAssetSuggestion $hotelAssetSuggestion
    ): array {
        $operations = [];
        // Creates mutate operations for the suggested text assets except for headlines and
        // descriptions, which were created previously.
        $requiredTextAssetCounts =
            array_fill_keys(array_keys(self::MIN_REQUIRED_TEXT_ASSET_COUNTS), 0);
        if ($hotelAssetSuggestion->getStatus() === HotelAssetSuggestionStatus::SUCCESS) {
            foreach ($hotelAssetSuggestion->getTextAssets() as $textAsset) {
                /** @var HotelTextAsset $textAsset */
                if (
                    $textAsset->getAssetFieldType() === AssetFieldType::HEADLINE
                    || $textAsset->getAssetFieldType() === AssetFieldType::DESCRIPTION
                ) {
                    // Headlines and descriptions were already created at the first step of this
                    // code example.
                    continue;
                }
                printf(
                    "A text asset with text '%s' is suggested for the asset field type '%s'.%s",
                    $textAsset->getText(),
                    AssetFieldType::name($textAsset->getAssetFieldType()),
                    PHP_EOL
                );
                $operations = array_merge(
                    $operations,
                    self::createTextAssetAndAssetGroupAssetOperations(
                        $customerId,
                        $textAsset->getText(),
                        $textAsset->getAssetFieldType()
                    )
                );
                $requiredTextAssetCounts[$textAsset->getAssetFieldType()]++;
            }
        }
        // Adds more text assets to fulfill the requirements.
        foreach (self::MIN_REQUIRED_TEXT_ASSET_COUNTS as $assetFieldType => $minCount) {
            if (
                $assetFieldType === AssetFieldType::HEADLINE
                || $assetFieldType === AssetFieldType::DESCRIPTION
            ) {
                // Headlines and descriptions were already created at the first step of this
                // code example.
                continue;
            }
            for ($i = 0; $i < $minCount - $requiredTextAssetCounts[$assetFieldType]; $i++) {
                printf(
                    "A default text '%s' is used to create a text asset for the asset"
                        . " field type '%s'.%s",
                    self::DEFAULT_TEXT_ASSETS_INFO[$assetFieldType][$i],
                    AssetFieldType::name($assetFieldType),
                    PHP_EOL
                );
                $operations = array_merge(
                    $operations,
                    self::createTextAssetAndAssetGroupAssetOperations(
                        $customerId,
                        self::DEFAULT_TEXT_ASSETS_INFO[$assetFieldType][$i],
                        $assetFieldType
                    )
                );
            }
        }

        return $operations;
    }

    /**
     * Creates image assets required for an asset group using the suggested hotel image assets. It
     * adds more image assets to fulfill the requirements if the suggested hotel image assets are
     * not enough.
     *
     * @param int $customerId the customer ID
     * @param HotelAssetSuggestion $hotelAssetSuggestion the hotel asset suggestion
     * @return MutateOperation[] a list of mutate operations that create image assets
     */
    private static function createImageAssetsForAssetGroup(
        int $customerId,
        HotelAssetSuggestion $hotelAssetSuggestion
    ): array {
        $operations = [];
        // Creates mutate operations for the suggested image assets.
        $requiredImageAssetCounts =
            array_fill_keys(array_keys(self::MIN_REQUIRED_IMAGE_ASSET_COUNTS), 0);
        foreach ($hotelAssetSuggestion->getImageAssets() as $imageAsset) {
            /** @var HotelImageAsset $imageAsset */
            printf(
                "An image asset with URL '%s' is suggested for the asset field type '%s'.%s",
                $imageAsset->getUri(),
                AssetFieldType::name($imageAsset->getAssetFieldType()),
                PHP_EOL
            );
            $operations = array_merge(
                $operations,
                self::createImageAssetAndAssetGroupAssetOperations(
                    $customerId,
                    $imageAsset->getUri(),
                    $imageAsset->getAssetFieldType(),
                    'Suggested image asset #' . Helper::getShortPrintableDatetime()
                )
            );
            // Keeps track of only required image assets. The service may sometimes suggest
            // optional image assets.
            if (array_key_exists($imageAsset->getAssetFieldType(), $requiredImageAssetCounts)) {
                $requiredImageAssetCounts[$imageAsset->getAssetFieldType()]++;
            }
        }
        // Adds more image assets to fulfill the requirements.
        foreach (self::MIN_REQUIRED_IMAGE_ASSET_COUNTS as $assetFieldType => $minCount) {
            for ($i = 0; $i < $minCount - $requiredImageAssetCounts[$assetFieldType]; $i++) {
                printf(
                    "A default image URL '%s' is used to create an image asset for the"
                    . " asset field type '%s'.%s",
                    self::DEFAULT_IMAGE_ASSETS_INFO[$assetFieldType][$i],
                    AssetFieldType::name($assetFieldType),
                    PHP_EOL
                );
                $operations = array_merge(
                    $operations,
                    self::createImageAssetAndAssetGroupAssetOperations(
                        $customerId,
                        self::DEFAULT_IMAGE_ASSETS_INFO[$assetFieldType][$i],
                        $assetFieldType,
                        strtolower(AssetFieldType::name($assetFieldType))
                        . Helper::getShortPrintableDatetime()
                    )
                );
            }
        }

        return $operations;
    }

    /**
     * Creates a list of mutate operations that create a new linked text asset.
     *
     * @param int $customerId the customer ID
     * @param string $text the text of the asset to be created
     * @param int $fieldType the field type of the new asset in the asset group asset
     * @return MutateOperation[] a list of mutate operations that create a new linked text asset
     */
    private static function createTextAssetAndAssetGroupAssetOperations(
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

    /**
     * Creates a list of mutate operations that create a new linked image asset.
     *
     * @param int $customerId the customer ID
     * @param string $url the URL of the image to be retrieved and put into an asset
     * @param int $fieldType the field type of the new asset in the asset group asset
     * @param string $assetName the asset name
     * @return MutateOperation[] a list of mutate operations that create a new linked image asset
     */
    private static function createImageAssetAndAssetGroupAssetOperations(
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
}

AddPerformanceMaxForTravelGoalsCampaign::main();

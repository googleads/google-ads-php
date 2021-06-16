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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V8\Common\AdImageAsset;
use Google\Ads\GoogleAds\V8\Common\AdTextAsset;
use Google\Ads\GoogleAds\V8\Common\AdVideoAsset;
use Google\Ads\GoogleAds\V8\Common\ImageAsset;
use Google\Ads\GoogleAds\V8\Common\LocalAdInfo;
use Google\Ads\GoogleAds\V8\Common\MaximizeConversionValue;
use Google\Ads\GoogleAds\V8\Common\YoutubeVideoAsset;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V8\Enums\AssetTypeEnum\AssetType;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V8\Enums\LocationSourceTypeEnum\LocationSourceType;
use Google\Ads\GoogleAds\V8\Enums\OptimizationGoalTypeEnum\OptimizationGoalType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroup;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\Asset;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Resources\Campaign\LocalCampaignSetting;
use Google\Ads\GoogleAds\V8\Resources\Campaign\OptimizationGoalSetting;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\AssetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupAdsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignBudgetsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignsResponse;
use Google\ApiCore\ApiException;

/**
 * This example adds a Local campaign.
 *
 * Prerequisite: To create a Local campaign, you need to define the store locations you want to
 * promote by linking your Google My Business account or selecting affiliate locations. More
 * information about Local campaigns can be found at:
 * https://support.google.com/google-ads/answer/9118422.
 */
class AddLocalCampaign
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    private const MARKETING_IMAGE_URL = 'https://goo.gl/3b9Wfh';
    private const LOGO_IMAGE_URL = 'https://goo.gl/mtt54n';
    private const YOUTUBE_VIDEO_ID = 't1fDo0VyeEo';

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
        $budgetResourceName = self::createCampaignBudget($googleAdsClient, $customerId);
        $campaignResourceName = self::createCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName
        );
        $adGroupResourceName = self::createAdGroup(
            $googleAdsClient,
            $customerId,
            $campaignResourceName
        );
        self::createLocalAd($googleAdsClient, $customerId, $adGroupResourceName);
    }

    /**
     * Creates a campaign budget.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the campaign budget resource name
     */
    // [START add_local_campaign]
    private static function createCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        $campaignBudget = new CampaignBudget([
            'name' => 'Interplanetary Cruise Budget #' . Helper::getPrintableDatetime(),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => 50000000,
            // A Local campaign cannot use a shared campaign budget.
            'explicitly_shared' => false
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($campaignBudget);

        // Issues a mutate request to add campaign budget.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        /** @var MutateCampaignBudgetsResponse $campaignBudgetResponse */
        $campaignBudgetResponse = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        $campaignBudgetResourceName = $campaignBudgetResponse->getResults()[0]->getResourceName();
        printf(
            "Created campaign budget with resource name: '%s'.%s",
            $campaignBudgetResourceName,
            PHP_EOL
        );

        return $campaignBudgetResourceName;
    }
    // [END add_local_campaign]

    /**
     * Creates a Local campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignBudgetResourceName the resource name of the campaign budget
     * @return string the resource name of the newly created campaign
     */
    // [START add_local_campaign_1]
    private static function createCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignBudgetResourceName
    ) {
        $campaign = new Campaign([
            'name' => 'Interplanetary Cruise Local #' . Helper::getPrintableDatetime(),
            'campaign_budget' => $campaignBudgetResourceName,
            // Recommendation: Set the campaign to PAUSED when creating it to prevent the ads
            // from immediately serving. Set to ENABLED once you've added targeting and the ads
            // are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // All Local campaigns have an advertisingChannelType of LOCAL and
            // advertisingChannelSubType of LOCAL_CAMPAIGN.
            'advertising_channel_type' => AdvertisingChannelType::LOCAL,
            'advertising_channel_sub_type' => AdvertisingChannelSubType::LOCAL_CAMPAIGN,
            // Bidding strategy must be set directly on the campaign.
            // Setting a portfolio bidding strategy by resource name is not supported.
            // Maximize conversion value is the only strategy supported for Local campaigns. An
            // optional ROAS (Return on Advertising Spend) can be set for
            // MaximizeConversionValue. The ROAS value must be specified as a ratio in the API. It
            // is calculated by dividing "total value" by "total spend".
            // For more information on maximize conversion value, see the support article:
            // http://support.google.com/google-ads/answer/7684216.
            'maximize_conversion_value' => new MaximizeConversionValue(['target_roas' => 3.5]),
            // Configures the Local campaign setting.
            'local_campaign_setting' => new LocalCampaignSetting([
                // Use the locations associated with the customer's linked Google My Business
                // account.
                'location_source_type' => LocationSourceType::GOOGLE_MY_BUSINESS
            ]),
            // Optimization goal setting is mandatory for Local campaigns. This example selects
            // driving directions and call clicks as goals.
            'optimization_goal_setting' => new OptimizationGoalSetting([
                'optimization_goal_types' => [
                    OptimizationGoalType::CALL_CLICKS,
                    OptimizationGoalType::DRIVING_DIRECTIONS
                ]
            ])
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        /** @var MutateCampaignsResponse $campaignResponse */
        $campaignResponse = $campaignServiceClient->mutateCampaigns(
            $customerId,
            [$campaignOperation]
        );

        $campaignResourceName = $campaignResponse->getResults()[0]->getResourceName();
        printf(
            "Created Local campaign with resource name: '%s'.%s",
            $campaignResourceName,
            PHP_EOL
        );

        return $campaignResourceName;
    }
    // [END add_local_campaign_1]

    /**
     * Creates an ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign
     * @return string the resource name of the newly created ad group
     */
    // [START add_local_campaign_2]
    private static function createAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates an ad group.
        // Note that the ad group type must not be set.
        // Since the advertisingChannelSubType is LOCAL_CAMPAIGN:
        //   1. you cannot override bid settings at the ad group level.
        //   2. you cannot add ad group criteria.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars Cruises #' . Helper::getPrintableDatetime(),
            'campaign' => $campaignResourceName,
            'status' => AdGroupStatus::ENABLED
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add the ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        /** @var MutateAdGroupsResponse $adGroupResponse */
        $adGroupResponse = $adGroupServiceClient->mutateAdGroups($customerId, [$adGroupOperation]);

        $adGroupResourceName = $adGroupResponse->getResults()[0]->getResourceName();
        printf("Created ad group with resource name: '%s'.%s", $adGroupResourceName, PHP_EOL);

        return $adGroupResourceName;
    }
    // [END add_local_campaign_2]

    /**
     * Creates a Local ad.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the ad group resource name
     */
    // [START add_local_campaign_3]
    private static function createLocalAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        $adGroupAd = new AdGroupAd([
            'ad_group' => $adGroupResourceName,
            'status' => AdGroupAdStatus::ENABLED,
            'ad' => new Ad([
                'final_urls' => ['https://www.example.com'],
                'local_ad' => new LocalAdInfo([
                    'headlines' => [
                        new AdTextAsset(['text' => 'Best Space Cruise Line']),
                        new AdTextAsset(['text' => 'Experience the Stars'])
                    ],
                    'descriptions' => [
                        new AdTextAsset(['text' => 'Buy your tickets now']),
                        new AdTextAsset(['text' => 'Visit the Red Planet'])
                    ],
                    'call_to_actions' => [new AdTextAsset(['text' => 'Shop Now'])],
                    // Sets the marketing image and logo image assets.
                    'marketing_images' => [new AdImageAsset(['asset' => self::createImageAsset(
                        $googleAdsClient,
                        $customerId,
                        self::MARKETING_IMAGE_URL,
                        'Marketing Image'
                    )])],
                    'logo_images' => [new AdImageAsset(['asset' => self::createImageAsset(
                        $googleAdsClient,
                        $customerId,
                        self::LOGO_IMAGE_URL,
                        'Square Marketing Image'
                    )])],
                    // Sets the video assets.
                    'videos' => [new AdVideoAsset(['asset' => self::createYoutubeVideoAsset(
                        $googleAdsClient,
                        $customerId,
                        self::YOUTUBE_VIDEO_ID,
                        'Local Campaigns'
                    )])]
                ])
            ])
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        /** @var MutateAdGroupAdsResponse $adGroupAdResponse */
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds(
            $customerId,
            [$adGroupAdOperation]
        );

        printf(
            "Created ad group ad with resource name: '%s'.%s",
            $adGroupAdResponse->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_local_campaign_3]

    /**
     * Creates an image asset.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $imageUrl the image URL
     * @param string $imageName the image name
     * @return string the created image asset's resource name
     */
    // [START add_local_campaign_4]
    private static function createImageAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $imageUrl,
        string $imageName
    ) {
        // Creates an asset.
        $asset = new Asset([
            'name' => $imageName,
            'type' => AssetType::IMAGE,
            'image_asset' => new ImageAsset(['data' => file_get_contents($imageUrl)])
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets($customerId, [$assetOperation]);

        // Prints out information about the newly added asset.
        $assetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "A new image asset has been added with resource name: '%s'.%s",
            $assetResourceName,
            PHP_EOL
        );

        return $assetResourceName;
    }
    // [END add_local_campaign_4]

    /**
     * Creates a YouTube video asset.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $youtubeVideoId the Youtube video ID
     * @param string $youtubeVideoName the Youtube video name
     * @return string the created video asset's resource name
     */
    // [START add_local_campaign_5]
    private static function createYoutubeVideoAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $youtubeVideoId,
        string $youtubeVideoName
    ) {
        // Creates an asset.
        $asset = new Asset([
            'name' => $youtubeVideoName,
            'type' => AssetType::YOUTUBE_VIDEO,
            'youtube_video_asset' => new YoutubeVideoAsset(['youtube_video_id' => $youtubeVideoId])
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets($customerId, [$assetOperation]);

        // Prints out information about the newly added asset.
        $assetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "A new YouTube video asset has been added with resource name: '%s'.%s",
            $assetResourceName,
            PHP_EOL
        );

        return $assetResourceName;
    }
    // [END add_local_campaign_5]
}

AddLocalCampaign::main();

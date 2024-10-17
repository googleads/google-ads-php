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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\AppAdInfo;
use Google\Ads\GoogleAds\V18\Common\LanguageInfo;
use Google\Ads\GoogleAds\V18\Common\LocationInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\AppCampaignBiddingStrategyGoalTypeEnum\AppCampaignBiddingStrategyGoalType;
use Google\Ads\GoogleAds\V18\Common\TargetCpa;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\AppCampaignAppStoreEnum\AppCampaignAppStore;
use Google\Ads\GoogleAds\V18\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\CriterionTypeEnum\CriterionType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\Campaign\AppCampaignSetting;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignBudgetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds an App campaign.
 *
 * For guidance regarding App Campaigns, see:
 * https://developers.google.com/google-ads/api/docs/app-campaigns/overview
 *
 * To get campaigns, run the GetCampaigns.php example.
 * To upload image assets for this campaign, run the UploadImageAsset.php example.
 */
class AddAppCampaign
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
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
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
        // Creates a budget for the campaign.
        $budgetResourceName = self::createBudget($googleAdsClient, $customerId);

        // Creates the campaign.
        $campaignResourceName = self::createCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName
        );

        // Sets campaign targeting.
        self::setCampaignTargetingCriteria($googleAdsClient, $customerId, $campaignResourceName);

        // Creates an ad group.
        $adGroupResourceName = self::createAdGroup(
            $googleAdsClient,
            $customerId,
            $campaignResourceName
        );

        // Creates an App ad.
        self::createAppAd($googleAdsClient, $customerId, $adGroupResourceName);
    }

    /**
     * Creates a budget under the given customer ID.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created budget
     */
    private static function createBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a campaign budget.
        $campaignBudget = new CampaignBudget([
            'name' => 'Interplanetary Cruise #' . Helper::getPrintableDatetime(),
            'amount_micros' => 50000000,
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            // An App campaign cannot use a shared campaign budget.
            // explicitly_shared must be set to false.
            'explicitly_shared' => false
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($campaignBudget);

        // Submits the campaign budget operation to add the campaign budget.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        $response = $campaignBudgetServiceClient->mutateCampaignBudgets(
            MutateCampaignBudgetsRequest::build($customerId, [$campaignBudgetOperation])
        );

        $createdCampaignBudgetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created campaign budget with resource name: '%s'.%s",
            $createdCampaignBudgetResourceName,
            PHP_EOL
        );

        return $createdCampaignBudgetResourceName;
    }

    /**
     * Creates an App campaign under the given customer ID.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $budgetResourceName the resource name of the budget to associate with the
     *      campaign
     * @return string the resource name of the newly created App campaign
     */
    private static function createCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $budgetResourceName
    ) {
        // Creates a campaign.
        $campaign = new Campaign([
            'name' => 'Interplanetary Cruise App #' . Helper::getPrintableDatetime(),
            'campaign_budget' => $budgetResourceName,
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // All App campaigns have an advertising_channel_type of
            // MULTI_CHANNEL to reflect the fact that ads from these campaigns are
            // eligible to appear on multiple channels.
            'advertising_channel_type' => AdvertisingChannelType::MULTI_CHANNEL,
            'advertising_channel_sub_type' => AdvertisingChannelSubType::APP_CAMPAIGN,
            // Sets the target CPA to $1 / app install.
            //
            // campaign_bidding_strategy is a 'oneof' message so setting target_cpa
            // is mutually exclusive with other bidding strategies such as
            // manual_cpc, commission, maximize_conversions, etc.
            // See https://developers.google.com/google-ads/api/reference/rpc
            // under current version / resources / Campaign.
            'target_cpa' => new TargetCpa(['target_cpa_micros' => 1000000]),
            // Sets the App campaign settings.
            'app_campaign_setting' => new AppCampaignSetting([
                'app_id' => 'com.google.android.apps.adwords',
                'app_store' => AppCampaignAppStore::GOOGLE_APP_STORE,
                // Optional: Optimize this campaign for getting new users for your app.
                'bidding_strategy_goal_type' =>
                    AppCampaignBiddingStrategyGoalType::OPTIMIZE_INSTALLS_TARGET_INSTALL_COST
            ]),
            // Optional fields.
            'start_date' => date('Ymd', strtotime('+1 day')),
            'end_date' => date('Ymd', strtotime('+365 days'))
            // If you select the
            // OPTIMIZE_IN_APP_CONVERSIONS_TARGET_INSTALL_COST goal type, then also
            // specify your in-app conversion types so the Google Ads API can focus
            // your campaign on people who are most likely to complete the
            // corresponding in-app actions.
            // 'selective_optimization' => new SelectiveOptimization([
            //     'conversion_actions' => ['INSERT_CONVERSION_TYPE_ID_HERE']
            // ])
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Submits the campaign operation and prints the results.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns(
            MutateCampaignsRequest::build($customerId, [$campaignOperation])
        );

        $createdCampaignResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created App campaign with resource name: '%s'.%s",
            $createdCampaignResourceName,
            PHP_EOL
        );

        return $createdCampaignResourceName;
    }

    /**
     * Sets campaign targeting criteria for a given campaign.
     *
     * Both location and language targeting are illustrated.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign to apply targeting to
     */
    private static function setCampaignTargetingCriteria(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        $campaignCriterionOperations = [];

        // Creates the location campaign criteria.
        // Besides using location_id, you can also search by location names from
        // GeoTargetConstantService.suggestGeoTargetConstants() and directly
        // apply GeoTargetConstant.resource_name here. An example can be found
        // in GetGeoTargetConstantByNames.php.
        $locationIds = [
            21137, // California
            2484   // Mexico
        ];
        foreach ($locationIds as $locationId) {
            // Creates a campaign criterion.
            $campaignCriterion = new CampaignCriterion([
                'campaign' => $campaignResourceName,
                'location' => new LocationInfo([
                    'geo_target_constant' => ResourceNames::forGeoTargetConstant($locationId)
                ])
            ]);

            // Creates a campaign criterion operation.
            $campaignCriterionOperation = new CampaignCriterionOperation();
            $campaignCriterionOperation->setCreate($campaignCriterion);

            $campaignCriterionOperations[] = $campaignCriterionOperation;
        }

        // Creates the language campaign criteria.
        $languageIds = [
            1000, // English
            1003  // Spanish
        ];
        foreach ($languageIds as $languageId) {
            // Creates a campaign criterion.
            $campaignCriterion = new CampaignCriterion([
                'campaign' => $campaignResourceName,
                'language' => new LanguageInfo([
                    'language_constant' => ResourceNames::forLanguageConstant($languageId)
                ])
            ]);

            // Creates a campaign criterion operation.
            $campaignCriterionOperation = new CampaignCriterionOperation();
            $campaignCriterionOperation->setCreate($campaignCriterion);

            $campaignCriterionOperations[] = $campaignCriterionOperation;
        }

        // Submits the criteria operations and prints their information.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        $response = $campaignCriterionServiceClient->mutateCampaignCriteria(
            MutateCampaignCriteriaRequest::build($customerId, $campaignCriterionOperations)
        );

        printf(
            "Created %d campaign criteria with resource names:%s",
            $response->getResults()->count(),
            PHP_EOL
        );

        foreach ($response->getResults() as $createdCampaignCriterion) {
            /** @var CampaignCriterion $createdCampaignCriterion */
            printf("\t%s%s", $createdCampaignCriterion->getResourceName(), PHP_EOL);
        }
    }

    /**
     * Creates an ad group for a given campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign to add the ad group to
     * @return string the resource name of the newly created ad group
     */
    private static function createAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates an ad group.
        // Note that the ad group type must not be set.
        // Since the advertising_channel_sub_type is APP_CAMPAIGN,
        //   1. you cannot override bid settings at the ad group level.
        //   2. you cannot add ad group criteria.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars cruises ' . Helper::getPrintableDatetime(),
            'status' => AdGroupStatus::ENABLED,
            'campaign' => $campaignResourceName
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Submits the ad group operation to add the ad group and prints the results.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups(
            MutateAdGroupsRequest::build($customerId, [$adGroupOperation])
        );

        $createdAdGroupResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created an ad group with resource name: '%s'.%s",
            $createdAdGroupResourceName,
            PHP_EOL
        );

        return $createdAdGroupResourceName;
    }

    /**
     * Creates an App ad for a given ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of the ad group to add the App ad to
     */
    private static function createAppAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates an ad group ad.
        $adGroupAd = new AdGroupAd([
            'status' => AdGroupAdStatus::ENABLED,
            'ad_group' => $adGroupResourceName,
            'ad' => new Ad([
                // ad_data is a 'oneof' message so setting app_ad
                // is mutually exclusive with ad data fields such as
                // text_ad, gmail_ad, etc.
                'app_ad' => new AppAdInfo([
                    'headlines' => [
                        new AdTextAsset(['text' => 'A cool puzzle game']),
                        new AdTextAsset(['text' => 'Remove connected blocks'])
                    ],
                    'descriptions' => [
                        new AdTextAsset(['text' => '3 difficulty levels']),
                        new AdTextAsset(['text' => '4 colorful fun skins'])
                    ]
                    // Optional: You can set up to 20 image assets for your campaign.
                    // 'images' => [
                    //     new AdImageAsset([
                    //         'asset' => INSERT_AD_IMAGE_ASSET_RESOURCE_NAME_HERE
                    //     ])
                    // ]
                ])
            ])
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Submits the ad group ad operation to add the ad group ad and prints the results.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        $createdAdGroupAdResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created an ad group ad with resource name: '%s'.%s",
            $createdAdGroupAdResourceName,
            PHP_EOL
        );
    }
}

AddAppCampaign::main();

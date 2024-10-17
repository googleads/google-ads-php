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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

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
use Google\Ads\GoogleAds\V18\Common\AdImageAsset;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\ImageAsset;
use Google\Ads\GoogleAds\V18\Common\ManualCpc;
use Google\Ads\GoogleAds\V18\Common\ResponsiveDisplayAdInfo;
use Google\Ads\GoogleAds\V18\Common\UserListInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\AssetTypeEnum\AssetType;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\DisplayAdFormatSettingEnum\DisplayAdFormatSetting;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\Campaign\ShoppingSetting;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAssetResult;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsRequest;
use Google\ApiCore\ApiException;

/**
 * This example creates a shopping campaign associated with an existing merchant center account,
 * along with a related ad group and dynamic display ad, and targets a user list for remarketing
 * purposes.
 */
class AddMerchantCenterDynamicRemarketingCampaign
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const MERCHANT_CENTER_ACCOUNT_ID = 'INSERT_MERCHANT_CENTER_ACCOUNT_ID_HERE';
    private const CAMPAIGN_BUDGET_ID = 'INSERT_CAMPAIGN_BUDGET_ID_HERE';
    private const USER_LIST_ID = 'INSERT_USER_LIST_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_BUDGET_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::USER_LIST_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_BUDGET_ID] ?: self::CAMPAIGN_BUDGET_ID,
                $options[ArgumentNames::USER_LIST_ID] ?: self::USER_LIST_ID
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
     * @param int $campaignBudgetId the campaign budget ID
     * @param int $userListId the user list ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId,
        int $campaignBudgetId,
        int $userListId
    ) {
        // Creates a shopping campaign associated with a given merchant center account.
        $campaignResourceName = self::createCampaign(
            $googleAdsClient,
            $customerId,
            $merchantCenterAccountId,
            $campaignBudgetId
        );

        // Creates an ad group for the campaign.
        $adGroupResourceName =
            self::createAdGroup($googleAdsClient, $customerId, $campaignResourceName);

        // Creates a dynamic display ad in the ad group.
        self::createAd($googleAdsClient, $customerId, $adGroupResourceName);

        // Targets a specific user list for remarketing.
        self::attachUserList($googleAdsClient, $customerId, $adGroupResourceName, $userListId);
    }

    /**
     * Creates a campaign linked to a Merchant Center product feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $merchantCenterAccountId the Merchant Center account ID
     * @param int $campaignBudgetId the campaign budget ID
     * @return string the resource name of the newly created campaign
     */
    // [START add_merchant_center_dynamic_remarketing_campaign_2]
    private static function createCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId,
        int $campaignBudgetId
    ): string {
        // Configures the settings for the shopping campaign.
        $shoppingSettings = new ShoppingSetting([
            'campaign_priority' => 0,
            'merchant_id' => $merchantCenterAccountId,
            'enable_local' => true
        ]);

        // Creates the campaign.
        $campaign = new Campaign([
            'name' => 'Shopping campaign #' . Helper::getPrintableDatetime(),
            // Dynamic remarketing campaigns are only available on the Google Display Network.
            'advertising_channel_type' => AdvertisingChannelType::DISPLAY,
            'status' => CampaignStatus::PAUSED,
            'campaign_budget' => ResourceNames::forCampaignBudget($customerId, $campaignBudgetId),
            'manual_cpc' => new ManualCpc(),
            // This connects the campaign to the merchant center account.
            'shopping_setting' => $shoppingSettings
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns(
            MutateCampaignsRequest::build($customerId, [$campaignOperation])
        );

        /** @var Campaign $addedCampaign */
        $addedCampaign = $response->getResults()[0];
        $addedCampaignResourceName = $addedCampaign->getResourceName();
        printf("Created campaign with resource name '%s'.%s", $addedCampaignResourceName, PHP_EOL);

        return $addedCampaignResourceName;
    }
    // [END add_merchant_center_dynamic_remarketing_campaign_2]

    /**
     * Creates an ad group for the remarketing campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign that
     *     the new ad group will belong to
     * @return string the resource name of the newly created ad group
     */
    // [START add_merchant_center_dynamic_remarketing_campaign_1]
    private static function createAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ): string {
        // Creates the ad group.
        $adGroup = new AdGroup([
            'name' => 'Dynamic remarketing ad group',
            'campaign' => $campaignResourceName,
            'status' => AdGroupStatus::ENABLED
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add the ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups(
            MutateAdGroupsRequest::build($customerId, [$adGroupOperation])
        );

        /** @var AdGroup $addedAdGroup */
        $addedAdGroup = $response->getResults()[0];
        $addedAdGroupResourceName = $addedAdGroup->getResourceName();
        printf("Created ad group with resource name '%s'.%s", $addedAdGroupResourceName, PHP_EOL);

        return $addedAdGroupResourceName;
    }
    // [END add_merchant_center_dynamic_remarketing_campaign_1]

    /**
     * Creates the responsive display ad.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of the ad group that
     *     the new ad group ad will belong to
     */
    // [START add_merchant_center_dynamic_remarketing_campaign]
    private static function createAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        $marketingImageResourceName = self::uploadAsset(
            $googleAdsClient,
            $customerId,
            'https://gaagl.page.link/Eit5',
            'Marketing Image'
        );
        $squareMarketingImageResourceName = self::uploadAsset(
            $googleAdsClient,
            $customerId,
            'https://gaagl.page.link/bjYi',
            'Square Marketing Image'
        );

        // Creates the responsive display ad info object.
        $responsiveDisplayAdInfo = new ResponsiveDisplayAdInfo([
            'marketing_images' => [new AdImageAsset(['asset' => $marketingImageResourceName])],
            'square_marketing_images' => [new AdImageAsset([
                'asset' => $squareMarketingImageResourceName
            ])],
            'headlines' => [new AdTextAsset(['text' => 'Travel'])],
            'long_headline' => new AdTextAsset(['text' => 'Travel the World']),
            'descriptions' => [new AdTextAsset(['text' => 'Take to the air!'])],
            'business_name' => 'Interplanetary Cruises',
            // Optional: Call to action text.
            // Valid texts: https://support.google.com/google-ads/answer/7005917
            'call_to_action_text' => 'Apply Now',
            // Optional: Sets the ad colors.
            'main_color' => '#0000ff',
            'accent_color' => '#ffff00',
            // Optional: Sets to false to strictly render the ad using the colors.
            'allow_flexible_color' => false,
            // Optional: Sets the format setting that the ad will be served in.
            'format_setting' => DisplayAdFormatSetting::NON_NATIVE
            // Optional: Creates a logo image and sets it to the ad.
            // 'logo_images' => [new AdImageAsset([
            //     'asset' => 'INSERT_LOGO_IMAGE_RESOURCE_NAME_HERE'
            // ])],
            // Optional: Creates a square logo image and sets it to the ad.
            // 'square_logo_images' => [new AdImageAsset([
            //     'asset' => 'INSERT_SQUARE_LOGO_IMAGE_RESOURCE_NAME_HERE'
            // ])]
        ]);

        // Creates a new ad group ad.
        $adGroupAd = new AdGroupAd([
            'ad' => new Ad([
                'responsive_display_ad' => $responsiveDisplayAdInfo,
                'final_urls' => ['http://www.example.com/']
            ]),
            'ad_group' => $adGroupResourceName
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        /** @var AdGroupAd $addedAdGroupAd */
        $addedAdGroupAd = $response->getResults()[0];
        printf(
            "Created ad group ad with resource name '%s'.%s",
            $addedAdGroupAd->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_merchant_center_dynamic_remarketing_campaign]

    /**
     * Adds an image asset to the Google Ads account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $imageUrl the image URL
     * @param string $assetName the asset name
     * @return string the resource name of the newly added asset
     */
    private static function uploadAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $imageUrl,
        string $assetName
    ): string {
        // Creates an asset.
        $asset = new Asset([
            'name' => $assetName,
            'type' => AssetType::IMAGE,
            'image_asset' => new ImageAsset(['data' => file_get_contents($imageUrl)])
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );

        // Prints the resource name of the added image asset.
        /** @var MutateAssetResult $addedImageAsset */
        $addedImageAsset = $response->getResults()[0];
        $addedImageAssetResourceName = $addedImageAsset->getResourceName();
        printf(
            "Created image asset with resource name '%s'.%s",
            $addedImageAssetResourceName,
            PHP_EOL
        );

        return $addedImageAssetResourceName;
    }

    /**
     * Targets a user list.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of the ad group that
     *     the user list will be attached to
     * @param int $userListId the user list ID
     */
    // [START add_merchant_center_dynamic_remarketing_campaign_3]
    private static function attachUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName,
        int $userListId
    ) {
        // Creates the ad group criterion that targets the user list.
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => $adGroupResourceName,
            'user_list' => new UserListInfo([
                'user_list' => ResourceNames::forUserList($customerId, $userListId)
            ])
        ]);

        // Creates an ad group criterion operation.
        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);

        // Issues a mutate request to add the ad group criterion.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, [$adGroupCriterionOperation])
        );

        /** @var AdGroupCriterion $addedAdGroupCriterion */
        $addedAdGroupCriterion = $response->getResults()[0];
        printf(
            "Created ad group criterion with resource name '%s'.%s",
            $addedAdGroupCriterion->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_merchant_center_dynamic_remarketing_campaign_3]
}

AddMerchantCenterDynamicRemarketingCampaign::main();

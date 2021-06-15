<?php

/**
 * Copyright 2019 Google LLC
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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\AdImageAsset;
use Google\Ads\GoogleAds\V8\Common\AdTextAsset;
use Google\Ads\GoogleAds\V8\Common\ImageAsset;
use Google\Ads\GoogleAds\V8\Common\ResponsiveDisplayAdInfo;
use Google\Ads\GoogleAds\V8\Common\TargetCpa;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V8\Enums\AssetTypeEnum\AssetType;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroup;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\Asset;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V8\Services\AssetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupAdsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignBudgetsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignsResponse;
use Google\ApiCore\ApiException;

/**
 * This example adds a Smart Display campaign, an ad group and a responsive display ad.
 * More information about Smart Display campaigns can be found at
 * https://support.google.com/google-ads/answer/7020281.
 *
 * IMPORTANT: The AssetService requires you to reuse what you've uploaded previously. Therefore,
 * you cannot create an image asset with the exactly same bytes. In case you want to run this
 * example more than once, note down the created assets' IDs and specify them as
 * command-line arguments for marketing and square marketing images.
 *
 * Alternatively, you can modify the image URLs' constants directly to use other images. You can
 * find image specifications in the ResponsiveDisplayAdInfo.php file.
 */
class AddSmartDisplayAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // See the descriptions of the 'marketing_images' and 'square_marketing_images' fields in
    // ResponsiveDisplayAdInfo.php for specifications of marketing and square marketing images.
    // They can be used to create an image asset for your customer account only once.
    private const MARKETING_IMAGE_URL = 'https://goo.gl/3b9Wfh';
    private const SQUARE_MARKETING_IMAGE_URL = 'https://goo.gl/mtt54n';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::MARKETING_IMAGE_ASSET_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::SQUARE_MARKETING_IMAGE_ASSET_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::MARKETING_IMAGE_ASSET_ID],
                $options[ArgumentNames::SQUARE_MARKETING_IMAGE_ASSET_ID]
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
     * @param int|null $marketingImageAssetId optional, the ID of marketing image asset
     * @param int|null $squareMarketingImageAssetId optional, the ID of square marketing image asset
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?int $marketingImageAssetId,
        ?int $squareMarketingImageAssetId
    ) {
        $budgetResourceName = self::createCampaignBudget($googleAdsClient, $customerId);
        $campaignResourceName = self::createSmartDisplayCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName
        );
        $adGroupResourceName = self::createAdGroup(
            $googleAdsClient,
            $customerId,
            $campaignResourceName
        );
        self::createResponsiveDisplayAd(
            $googleAdsClient,
            $customerId,
            $adGroupResourceName,
            $marketingImageAssetId,
            $squareMarketingImageAssetId
        );
    }

    /**
     * Creates a campaign budget.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of newly created campaign budget
     */
    // [START add_smart_display_ad]
    private static function createCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a campaign budget.
        $campaignBudget = new CampaignBudget([
            'name' => 'Interplanetary Cruise Budget #' . Helper::getPrintableDatetime(),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => 5000000
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($campaignBudget);

        // Issues a mutate request to add campaign budgets.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        /** @var MutateCampaignBudgetsResponse $campaignBudgetResponse */
        $campaignBudgetResponse = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        // Prints out some information about the created campaign budget.
        $campaignBudgetResourceName = $campaignBudgetResponse->getResults()[0]->getResourceName();
        printf("Added budget named '%s'.%s", $campaignBudgetResourceName, PHP_EOL);

        return $campaignBudgetResourceName;
    }
    // [END add_smart_display_ad]

    /**
     * Creates a Smart Display campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignBudgetResourceName the resource name of the campaign budget
     * @return string the resource name of the newly created campaign
     */
    // [START add_smart_display_ad_1]
    private static function createSmartDisplayCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignBudgetResourceName
    ) {
        $campaign = new Campaign([
            'name' => 'Smart Display Campaign #' . Helper::getPrintableDatetime(),
            // Smart Display campaign requires the advertising_channel_type as 'DISPLAY'.
            'advertising_channel_type' => AdvertisingChannelType::DISPLAY,
            // Smart Display campaign requires the advertising_channel_sub_type as
            // 'DISPLAY_SMART_CAMPAIGN'.
            'advertising_channel_sub_type' => AdvertisingChannelSubType::DISPLAY_SMART_CAMPAIGN,
            // Smart Display campaign requires the TargetCpa bidding strategy.
            'target_cpa' => new TargetCpa(['target_cpa_micros' => 5000000]),
            'campaign_budget' => $campaignBudgetResourceName,
            // Optional: Sets the start and end dates for the campaign, beginning one day from
            // now and ending a month from now.
            'start_date' => date('Ymd', strtotime('+1 day')),
            'end_date' => date('Ymd', strtotime('+1 month'))
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        /** @var MutateCampaignsResponse $campaignResponse */
        $campaignResponse = $campaignServiceClient->mutateCampaigns(
            $customerId,
            [$campaignOperation]
        );

        $campaignResourceName = $campaignResponse->getResults()[0]->getResourceName();
        printf("Added a Smart Display campaign named '%s'.%s", $campaignResourceName, PHP_EOL);

        return $campaignResourceName;
    }
    // [END add_smart_display_ad_1]

    /**
     * Creates an ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign
     * @return string the resource name of the newly created ad group
     */
    // [START add_smart_display_ad_4]
    private static function createAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Constructs an ad group and set its type.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars Cruises #' . Helper::getPrintableDatetime(),
            'campaign' => $campaignResourceName,
            'status' => AdGroupStatus::PAUSED,
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add the ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        /** @var MutateAdGroupsResponse $adGroupResponse */
        $adGroupResponse = $adGroupServiceClient->mutateAdGroups($customerId, [$adGroupOperation]);

        // Print out some information about the added ad group.
        $adGroupResourceName = $adGroupResponse->getResults()[0]->getResourceName();
        printf("Added ad group named '%s'.%s", $adGroupResourceName, PHP_EOL);

        return $adGroupResourceName;
    }
    // [END add_smart_display_ad_4]

    /**
     * Creates a responsive display ad, which is a recommended ad type for Smart Display campaigns.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the ad group resource name
     * @param int|null $marketingImageAssetId optional, the ID of marketing image asset
     * @param int|null $squareMarketingImageAssetId optional, the ID of square marketing image asset
     */
    // [START add_smart_display_ad_2]
    private static function createResponsiveDisplayAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName,
        ?int $marketingImageAssetId,
        ?int $squareMarketingImageAssetId
    ) {
        // Creates a new image asset for marketing image and square marketing image if there are no
        // assets' IDs specified.
        $marketingImageAssetResourceName = $marketingImageAssetId
            ? ResourceNames::forAsset($customerId, $marketingImageAssetId)
            : self::createImageAsset(
                $googleAdsClient,
                $customerId,
                self::MARKETING_IMAGE_URL,
                'Marketing Image'
            );
        $squareMarketingImageAssetResourceName = $squareMarketingImageAssetId
            ? ResourceNames::forAsset($customerId, $squareMarketingImageAssetId)
            : self::createImageAsset(
                $googleAdsClient,
                $customerId,
                self::SQUARE_MARKETING_IMAGE_URL,
                'Square Marketing Image'
            );

        // Creates a responsive display ad info.
        $responsiveDisplayAdInfo = new ResponsiveDisplayAdInfo([
            // Sets some basic required information for the responsive display ad.
            'headlines' => [new AdTextAsset(['text' => 'Travel'])],
            'long_headline' => new AdTextAsset(['text' => 'Travel the World']),
            'descriptions' => [new AdTextAsset(['text' => 'Take to the air!'])],
            'business_name' => 'Google',
            // Sets the marketing image and square marketing image to the previously created
            // image assets.
            'marketing_images' => [
                new AdImageAsset(['asset' => $marketingImageAssetResourceName])
            ],
            'square_marketing_images' => [
                new AdImageAsset(['asset' => $squareMarketingImageAssetResourceName])
            ],
            // Optional: Sets call to action text, price prefix and promotion text.
            'call_to_action_text' => 'Shop Now',
            'price_prefix' => 'as low as',
            'promo_text' => 'Free shipping!',
        ]);

        // Creates an ad group ad with the created responsive display ad info.
        $adGroupAd = new AdGroupAd([
            'ad_group' => $adGroupResourceName,
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => new Ad([
                'final_urls' => ['https://www.example.com'],
                'responsive_display_ad' => $responsiveDisplayAdInfo
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

        // Prints out some information about the newly created ad.
        $adGroupAdResourceName = $adGroupAdResponse->getResults()[0]->getResourceName();
        printf("Added ad group ad named '%s'.%s", $adGroupAdResourceName, PHP_EOL);
    }
    // [END add_smart_display_ad_2]

    /**
     * Creates an image asset to be used for creating ads.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $imageUrl the image URL to be downloaded
     * @param string $imageName the image name
     * @return string the created image asset's resource name
     */
    // [START add_smart_display_ad_3]
    private static function createImageAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $imageUrl,
        string $imageName
    ) {
        // Creates a media file.
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
    // [END add_smart_display_ad_3]
}

AddSmartDisplayAd::main();

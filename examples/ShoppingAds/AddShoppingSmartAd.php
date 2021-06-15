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

namespace Google\Ads\GoogleAds\Examples\ShoppingAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V8\Common\ListingGroupInfo;
use Google\Ads\GoogleAds\V8\Common\MaximizeConversionValue;
use Google\Ads\GoogleAds\V8\Common\ShoppingSmartAdInfo;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V8\Enums\ListingGroupTypeEnum\ListingGroupType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroup;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Resources\Campaign\ShoppingSetting;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\ApiCore\ApiException;

/**
 * This example creates a Smart Shopping campaign, a Smart Shopping ad group, a Smart Shopping ad
 * group ad and a listing group for "All products".
 *
 * Prerequisites
 * - You need to have access to a Merchant Center account. You can find instructions
 * to create a Merchant Center account here: https://support.google.com/merchants/answer/188924.
 * This account must be linked to your Google Ads account. The integration instructions can be
 * found at: https://developers.google.com/google-ads/api/docs/shopping-ads/merchant-center.
 * - You need your Google Ads account to track conversions. The different ways to track conversions
 * can be found here: https://support.google.com/google-ads/answer/1722054.
 */
class AddShoppingSmartAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const MERCHANT_CENTER_ACCOUNT_ID = 'INSERT_MERCHANT_CENTER_ACCOUNT_ID_HERE';
    private const CREATE_DEFAULT_LISTING_GROUP = 'INSERT_BOOLEAN_TRUE_OR_FALSE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CREATE_DEFAULT_LISTING_GROUP => GetOpt::REQUIRED_ARGUMENT
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
                filter_var(
                    $options[ArgumentNames::CREATE_DEFAULT_LISTING_GROUP]
                        ?: self::CREATE_DEFAULT_LISTING_GROUP,
                    FILTER_VALIDATE_BOOLEAN
                )
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
     * @param bool $createDefaultListingGroup indicates if a default listing
     *     group should be created for the ad group. Set to false if the listing group will be
     *     constructed elsewhere.
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId,
        bool $createDefaultListingGroup
    ) {
        // Creates a budget to be used by the campaign that will be created below.
        $budgetResourceName = self::addCampaignBudget($googleAdsClient, $customerId);

        // Creates a Smart Shopping campaign.
        $campaignResourceName = self::addSmartShoppingCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName,
            $merchantCenterAccountId
        );

        // Creates a Smart Shopping ad group.
        $adGroupResourceName =
            self::addSmartShoppingAdGroup($googleAdsClient, $customerId, $campaignResourceName);

        // Creates a Smart Shopping ad group ad.
        self::addSmartShoppingAdGroupAd($googleAdsClient, $customerId, $adGroupResourceName);

        if ($createDefaultListingGroup) {
            // A product group is a subset of inventory. Listing groups are the equivalent
            // of product groups in the API and allow you to bid on the chosen group or
            // exclude a group from bidding.
            // This method creates an ad group criterion containing a listing group.
            self::addShoppingListingGroup(
                $googleAdsClient,
                $customerId,
                $adGroupResourceName
            );
        }
    }

    /**
     * Creates a new campaign budget for Smart Shopping ads in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created budget
     */
    private static function addCampaignBudget(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a campaign budget.
        $budget = new CampaignBudget([
            'name' => 'Interplanetary Cruise Budget #' . Helper::getPrintableDatetime(),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            // The budget is specified in the local currency of the account.
            // The amount should be specified in micros, where one million is equivalent to one
            // unit.
            'amount_micros' => 50000000,
            // Budgets for Smart Shopping campaigns cannot be shared.
            'explicitly_shared' => false
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($budget);

        // Issues a mutate request.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        $response = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        /** @var CampaignBudget $addedBudget */
        $addedBudget = $response->getResults()[0];
        printf(
            "Added a budget with resource name '%s'.%s",
            $addedBudget->getResourceName(),
            PHP_EOL
        );

        return $addedBudget->getResourceName();
    }

    /**
     * Creates a new shopping campaign for Smart Shopping ads in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $budgetResourceName the resource name of budget for a new campaign
     * @param int $merchantCenterAccountId the Merchant Center account ID
     * @return string the resource name of the newly created campaign
     */
    // [START add_shopping_smart_ad_3]
    private static function addSmartShoppingCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $budgetResourceName,
        int $merchantCenterAccountId
    ) {
        // Configures the shopping settings for Smart Shopping campaigns.
        $shoppingSettings = new ShoppingSetting([
            // Sets the sales country of products to include in the campaign.
            // Only products from Merchant Center targeting this country will appear in the
            // campaign.
            'sales_country' => 'US',
            'merchant_id' => $merchantCenterAccountId
        ]);

        // [START add_shopping_smart_ad]
        // Creates the campaign.
        $campaign = new Campaign([
            'name' => 'Interplanetary Cruise Campaign #' . Helper::getPrintableDatetime(),
            // Configures settings related to shopping campaigns including
            // advertising channel type, advertising sub-type and shopping setting.
            'advertising_channel_type' => AdvertisingChannelType::SHOPPING,
            'advertising_channel_sub_type' => AdvertisingChannelSubType::SHOPPING_SMART_ADS,
            'shopping_setting' => $shoppingSettings,
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // Bidding strategy must be set directly on the campaign.
            // Setting a portfolio bidding strategy by resource name is not supported.
            // Maximize conversion value is the only strategy supported for Smart Shopping
            // campaigns.
            // An optional ROAS (Return on Advertising Spend) can be set for
            // MaximizeConversionValue.
            // The ROAS value must be specified as a ratio in the API. It is calculated by dividing
            // "total value" by "total spend".
            // For more information on maximize conversion value, see the support article:
            // http://support.google.com/google-ads/answer/7684216.
            'maximize_conversion_value' => new MaximizeConversionValue(['target_roas' => 3.5]),
            // Sets the budget.
            'campaign_budget' => $budgetResourceName
        ]);
        // [END add_shopping_smart_ad]

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns($customerId, [$campaignOperation]);

        /** @var Campaign $addedCampaign */
        $addedCampaign = $response->getResults()[0];
        $addedCampaignResourceName = $addedCampaign->getResourceName();
        printf(
            "Added a Smart Shopping campaign with resource name: '%s'.%s",
            $addedCampaignResourceName,
            PHP_EOL
        );

        return $addedCampaignResourceName;
    }
    // [END add_shopping_smart_ad_3]

    /**
     * Creates a new ad group in the specified Smart Shopping campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign that
     *     the new ad group will belong to
     * @return string the resource name of the newly created ad group
     */
    // [START add_shopping_smart_ad_2]
    private static function addSmartShoppingAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates an ad group.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars Cruise #' . Helper::getPrintableDatetime(),
            'campaign' => $campaignResourceName,
            // Sets the ad group type to SHOPPING_SMART_ADS. This cannot be set to other types.
            'type' => AdGroupType::SHOPPING_SMART_ADS,
            'status' => AdGroupStatus::ENABLED
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add the ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups($customerId, [$adGroupOperation]);

        /** @var AdGroup $addedAdGroup */
        $addedAdGroup = $response->getResults()[0];
        $addedAdGroupResourceName = $addedAdGroup->getResourceName();
        printf(
            "Added a Smart Shopping ad group with resource name: '%s'.%s",
            $addedAdGroupResourceName,
            PHP_EOL
        );

        return $addedAdGroupResourceName;
    }
    // [END add_shopping_smart_ad_2]

    /**
     * Creates a new ad group ad in the specified Smart Shopping ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of the ad group that
     *     the new ad group ad will belong to
     */
    // [START add_shopping_smart_ad_1]
    private static function addSmartShoppingAdGroupAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates a new ad group ad.
        $adGroupAd = new AdGroupAd([
            // Sets a new Smart Shopping ad.
            'ad' => new Ad(['shopping_smart_ad' => new ShoppingSmartAdInfo()]),
            // Sets the ad group.
            'ad_group' => $adGroupResourceName
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$adGroupAdOperation]);

        /** @var AdGroupAd $addedAdGroupAd */
        $addedAdGroupAd = $response->getResults()[0];
        printf(
            "Added a Smart Shopping ad group ad with resource name: '%s'.%s",
            $addedAdGroupAd->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_shopping_smart_ad_1]

    /**
     * Creates a new Shopping listing group for the specified ad group. This is known as a "product
     * group" in the Google Ads user interface. The listing group will be added to the ad group
     * using an "ad group criterion". For more information on listing groups see the Google Ads
     * API Shopping guide: https://developers.google.com/google-ads/api/docs/shopping-ads/overview.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of the ad group that
     *     the new listing group will belong to
     */
    private static function addShoppingListingGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates a new ad group criterion. This will contain a listing group.
        // This will be the listing group for 'All products' and will contain a single root node.
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => $adGroupResourceName,
            'status' => AdGroupAdStatus::ENABLED,
            // Creates a new listing group. This will be the top-level "root" node.
            // Sets the type of the listing group to be a biddable unit.
            'listing_group' => new ListingGroupInfo(['type' => ListingGroupType::UNIT])
            // Note: Listing groups do not require bids for Smart Shopping campaigns.
        ]);

        // Creates an ad group criterion operation.
        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);

        // Issues a mutate request to add the ad group criterion.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            $customerId,
            [$adGroupCriterionOperation]
        );

        /** @var AdGroupCriterion $addedAdGroupCriterion */
        $addedAdGroupCriterion = $response->getResults()[0];
        printf(
            "Added an ad group criterion containing a listing group with resource name: '%s'.%s",
            $addedAdGroupCriterion->getResourceName(),
            PHP_EOL
        );
    }
}

AddShoppingSmartAd::main();

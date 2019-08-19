<?php
/**
 * Copyright 2018 Google LLC
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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Common\ListingGroupInfo;
use Google\Ads\GoogleAds\V2\Common\ManualCpc;
use Google\Ads\GoogleAds\V2\Common\ShoppingProductAdInfo;
use Google\Ads\GoogleAds\V2\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V2\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V2\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V2\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V2\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V2\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V2\Enums\ListingGroupTypeEnum\ListingGroupType;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\Ad;
use Google\Ads\GoogleAds\V2\Resources\AdGroup;
use Google\Ads\GoogleAds\V2\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V2\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V2\Resources\Campaign;
use Google\Ads\GoogleAds\V2\Resources\Campaign\ShoppingSetting;
use Google\Ads\GoogleAds\V2\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V2\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V2\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V2\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\Int32Value;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example creates a standard shopping campaign, a shopping product ad group and a shopping
 * product ad.
 *
 * <p>Prerequisite: You need to have access to a Merchant Center account. You can find instructions
 * to create a Merchant Center account here: https://support.google.com/merchants/answer/188924.
 * This account must be linked to your Google Ads account.
 */
class AddShoppingProductAd
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const MERCHANT_CENTER_ACCOUNT_ID = 'INSERT_MERCHANT_CENTER_ACCOUNT_ID_HERE';
    const SHOULD_CREATE_DEFAULT_LISTING_GROUP = 'INSERT_BOOLEAN_TRUE_OR_FALSE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::SHOULD_CREATE_DEFAULT_LISTING_GROUP => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID]
                    ?: self::MERCHANT_CENTER_ACCOUNT_ID,
                $options[ArgumentNames::SHOULD_CREATE_DEFAULT_LISTING_GROUP]
                    ?: self::SHOULD_CREATE_DEFAULT_LISTING_GROUP
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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $merchantCenterAccountId the Merchant Center account ID
     * @param bool $shouldCreateDefaultListingGroup true if a default listing group should be
     *     created for the ad group. Set to false if the listing group will be constructed
     *     elsewhere. See AddShoppingProductListingGroupTree for a more comprehensive example
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $merchantCenterAccountId,
        bool $shouldCreateDefaultListingGroup
    ) {
        // Creates a budget to be used by the campaign that will be created below.
        $budgetResourceName = self::addCampaignBudget($googleAdsClient, $customerId);
        // Creates a standard shopping campaign.
        $campaignResourceName = self::addStandardShoppingCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName,
            $merchantCenterAccountId
        );
        // Creates a shopping product ad group.
        $adGroupResourceName =
            self::addShoppingProductAdGroup($googleAdsClient, $customerId, $campaignResourceName);
        // Creates a shopping product ad group ad.
        self::addShoppingProductAdGroupAd($googleAdsClient, $customerId, $adGroupResourceName);

        if ($shouldCreateDefaultListingGroup === "true") {
            // Creates an ad group criterion containing a listing group.
            // This will be the listing group tree for 'All products' and will contain a single
            // biddable unit node.
            self::addDefaultShoppingListingGroup(
                $googleAdsClient,
                $customerId,
                $adGroupResourceName
            );
        }
    }

    /**
     * Creates a new campaign budget in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created budget
     */
    private static function addCampaignBudget(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a campaign budget.
        $budget = new CampaignBudget([
            'name' => new StringValue(['value' => 'Interplanetary Cruise Budget #' . uniqid()]),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            // Sets the amount of budget.
            'amount_micros' => new Int64Value(['value' => 50000000])
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
     * Creates a new shopping product campaign in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $budgetResourceName the resource name of budget for a new campaign
     * @param int $merchantCenterAccountId the Merchant Center account ID
     * @return string the resource name of the newly created campaign
     */
    // [START addShoppingProductCampaign]
    private static function addStandardShoppingCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $budgetResourceName,
        int $merchantCenterAccountId
    ) {
        // Creates a standard shopping campaign.
        $campaign = new Campaign([
            'name' => new StringValue(['value' => 'Interplanetary Cruise Campaign #' . uniqid()]),
            // Configures settings related to shopping campaigns including advertising channel type
            // and shopping setting.
            'advertising_channel_type' => AdvertisingChannelType::SHOPPING,
            // Configures the shopping settings.
            'shopping_setting' => new ShoppingSetting([
                // Sets the sales country of products to include in the campaign.
                'sales_country' => new StringValue(['value' => 'US']),
                // Sets the priority of the campaign. Higher numbers take priority over lower
                // numbers. For Shopping product ad campaigns, allowed values are between 0 and 2,
                // inclusive.
                'campaign_priority' => new Int32Value(['value' => 0]),
                'merchant_id' => new Int64Value(['value' => $merchantCenterAccountId]),
                // Enables local inventory ads for this campaign
                'enable_local' => new BoolValue(['value' => true])
            ]),
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // Sets the bidding strategy to Manual CPC (with eCPC enabled)
            // Recommendation: Use one of the automated bidding strategies for Shopping campaigns
            // to help you optimize your advertising spend. More information can be found here:
            // https://support.google.com/google-ads/answer/6309029.
            'manual_cpc' => new ManualCpc([
                'enhanced_cpc_enabled' => new BoolValue(['value' => true])
            ]),
            // Sets the budget.
            'campaign_budget' => new StringValue(['value' => $budgetResourceName]),
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add campaigns.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns($customerId, [$campaignOperation]);

        /** @var Campaign $addedCampaign */
        $addedCampaign = $response->getResults()[0];
        printf(
            "Added a standard shopping campaign with resource name '%s'.%s",
            $addedCampaign->getResourceName(),
            PHP_EOL
        );

        return $addedCampaign->getResourceName();
    }
    // [END addShoppingProductCampaign]

    /**
     * Creates a new shopping product ad group in the specified campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of campaign that a new ad group will
     *     belong to
     * @return string the resource name of the newly created ad group
     */
    // [START addShoppingProductAdGroup]
    private static function addShoppingProductAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates an ad group.
        $adGroup = new AdGroup([
            'name' => new StringValue(['value' => 'Earth to Mars Cruise #' . uniqid()]),
            // Sets the campaign.
            'campaign' => new StringValue(['value' => $campaignResourceName]),
            // Sets the ad group type to SHOPPING_PRODUCT_ADS. This is the only value possible for
            // ad groups that contain shopping product ads.
            'type' => AdGroupType::SHOPPING_PRODUCT_ADS,
            'cpc_bid_micros' => new Int64Value(['value' => 10000000]),
            'status' => AdGroupStatus::ENABLED,
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add an ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups($customerId, [$adGroupOperation]);

        /** @var AdGroup $addedAdGroup */
        $addedAdGroup = $response->getResults()[0];
        printf(
            "Added a shopping product ad group with resource name '%s'.%s",
            $addedAdGroup->getResourceName(),
            PHP_EOL
        );

        return $addedAdGroup->getResourceName();
    }
    // [END addShoppingProductAdGroup]

    /**
     * Creates a new shopping product ad group ad in the specified ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of ad group that a new ad group ad will
     *     belong to
     */
    // [START addShoppingProductAdGroupAd]
    private static function addShoppingProductAdGroupAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates a new shopping product ad.
        $ad = new Ad(['shopping_product_ad' => new ShoppingProductAdInfo()]);

        // Creates a new ad group ad and sets the shopping product ad to it.
        $adGroupAd = new AdGroupAd([
            'ad' => $ad,
            'status' => AdGroupAdStatus::PAUSED,
            // Sets the ad group.
            'ad_group' => new StringValue(['value' => $adGroupResourceName])
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add an ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$adGroupAdOperation]);

        /** @var AdGroupAd $addedAdGroupAd */
        $addedAdGroupAd = $response->getResults()[0];
        printf(
            "Added a shopping product ad group ad with resource name '%s'.%s",
            $addedAdGroupAd->getResourceName(),
            PHP_EOL
        );
    }
    // [END addShoppingProductAdGroupAd]

    /**
     * Creates a new default shopping listing group for the specified ad group. A listing group is
     * the Google Ads API representation of a "product group" described in the Google Ads user
     * interface. The listing group will be added to the ad group using an "ad group criterion".
     * The criterion will contain the bid for a given listing group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of ad group that the new listing group
     *     will belong to
     */
    // [START addDefaultShoppingListingGroup]
    private static function addDefaultShoppingListingGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates a new ad group criterion. This will contain the "default" listing group (All
        // products).
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => new StringValue(['value' => $adGroupResourceName]),
            'status' => AdGroupAdStatus::ENABLED,
            // Creates a new listing group. This will be the top-level "root" node.
            // Set the type of the listing group to be a biddable unit.
            'listing_group' => new ListingGroupInfo(['type' => ListingGroupType::UNIT]),
            // Set the bid for products in this listing group unit.
            'cpc_bid_micros' => new Int64Value(['value' => 500000])
        ]);

        // Creates an ad group criterion operation.
        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);

        // Issues a mutate request to add an ad group criterion.
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
    // [END addDefaultShoppingListingGroup]
}

AddShoppingProductAd::main();

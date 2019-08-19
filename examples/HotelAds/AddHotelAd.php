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

namespace Google\Ads\GoogleAds\Examples\HotelAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Common\HotelAdInfo;
use Google\Ads\GoogleAds\V2\Common\PercentCpc;
use Google\Ads\GoogleAds\V2\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V2\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V2\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V2\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V2\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V2\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\Ad;
use Google\Ads\GoogleAds\V2\Resources\AdGroup;
use Google\Ads\GoogleAds\V2\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V2\Resources\Campaign;
use Google\Ads\GoogleAds\V2\Resources\Campaign\HotelSettingInfo;
use Google\Ads\GoogleAds\V2\Resources\Campaign\NetworkSettings;
use Google\Ads\GoogleAds\V2\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V2\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V2\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example creates a hotel campaign, a hotel ad group and hotel ad group ad.
 *
 * <p> Prerequisite: You need to have an access to the Hotel Ads Center, which can be granted during
 * integration with Google Hotels. The integration instructions can be found at:
 * https://support.google.com/hotelprices/answer/6101897.
 */
class AddHotelAds
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Specify your Hotels account ID below. You can see how to find the account ID in the Hotel
    // Ads Center at: https://support.google.com/hotelprices/answer/6399770.
    // This ID is the same account ID that you use in API requests to the Travel Partner APIs
    // (https://developers.google.com/hotels/hotel-ads/api-reference/).
    const HOTEL_CENTER_ACCOUNT_ID = 'INSERT_HOTEL_CENTER_ACCOUNT_ID_HERE';
    // Specify maximum bid limit that can be set when creating a campaign using the Percent CPC
    // bidding strategy.
    const CPC_BID_CEILING_MICRO_AMOUNT = 20000000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::HOTEL_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CPC_BID_CEILING_MICRO_AMOUNT => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::HOTEL_CENTER_ACCOUNT_ID] ?: self::HOTEL_CENTER_ACCOUNT_ID,
                $options[ArgumentNames::CPC_BID_CEILING_MICRO_AMOUNT]
                    ?: self::CPC_BID_CEILING_MICRO_AMOUNT
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
     * @param int $hotelCenterAccountId the Hotel Center account ID
     * @param int $cpcBidCeilingMicroAmount the CPC bid ceiling micro amount
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $hotelCenterAccountId,
        int $cpcBidCeilingMicroAmount
    ) {
        // Creates a budget to be used by the campaign that will be created below.
        $budgetResourceName = self::addCampaignBudget($googleAdsClient, $customerId);
        // Creates a hotel campaign.
        $campaignResourceName = self::addHotelCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName,
            $hotelCenterAccountId,
            $cpcBidCeilingMicroAmount
        );
        // Creates a hotel ad group.
        $adGroupResourceName =
            self::addHotelAdGroup($googleAdsClient, $customerId, $campaignResourceName);
        // Creates a hotel ad group ad.
        self::addHotelAdGroupAd($googleAdsClient, $customerId, $adGroupResourceName);
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
            'amount_micros' => new Int64Value(['value' => 50000000]),
            // Makes the budget explicitly shared.
            'explicitly_shared' => new BoolValue(['value' => true])
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
     * Creates a new hotel campaign in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $budgetResourceName the resource name of budget for a new campaign
     * @param int $hotelCenterAccountId the Hotel Center account ID
     * @param int $cpcBidCeilingMicroAmount the CPC bid ceiling micro amount
     * @return string the resource name of the newly created campaign
     */
    // [START addHotelCampaign]
    private static function addHotelCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $budgetResourceName,
        int $hotelCenterAccountId,
        int $cpcBidCeilingMicroAmount
    ) {
        // Creates a campaign.
        $campaign = new Campaign([
            'name' => new StringValue(['value' => 'Interplanetary Cruise Campaign #' . uniqid()]),
            // Configures settings related to hotel campaigns including advertising channel type
            // and hotel setting info.
            'advertising_channel_type' => AdvertisingChannelType::HOTEL,
            'hotel_setting' => new HotelSettingInfo([
                'hotel_center_id' => new Int64Value(['value' => $hotelCenterAccountId])
            ]),
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // Sets the bidding strategy to PercentCpc. Only Manual CPC and Percent CPC can be used
            // for hotel campaigns.
            'percent_cpc' => new PercentCpc([
                'cpc_bid_ceiling_micros' => new Int64Value(['value' => $cpcBidCeilingMicroAmount])
            ]),
            // Sets the budget.
            'campaign_budget' => new StringValue(['value' => $budgetResourceName]),
            // Configures the campaign network options. Only Google Search is allowed for
            // hotel campaigns.
            'network_settings' => new NetworkSettings([
                'target_google_search' => new BoolValue(['value' => true]),
            ]),
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
            "Added a hotel campaign with resource name '%s'.%s",
            $addedCampaign->getResourceName(),
            PHP_EOL
        );

        return $addedCampaign->getResourceName();
    }
    // [END addHotelCampaign]

    /**
     * Creates a new hotel ad group in the specified campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of campaign that a new ad group will
     *     belong to
     * @return string the resource name of the newly created ad group
     */
    // [START addHotelAdGroup]
    private static function addHotelAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates an ad group.
        $adGroup = new AdGroup([
            'name' => new StringValue(['value' => 'Earth to Mars Cruise #' . uniqid()]),
            // Sets the campaign.
            'campaign' => new StringValue(['value' => $campaignResourceName]),
            // Sets the ad group type to HOTEL_ADS.
            // This cannot be set to other types.
            'type' => AdGroupType::HOTEL_ADS,
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
            "Added a hotel ad group with resource name '%s'.%s",
            $addedAdGroup->getResourceName(),
            PHP_EOL
        );

        return $addedAdGroup->getResourceName();
    }
    // [END addHotelAdGroup]

    /**
     * Creates a new hotel ad group ad in the specified ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of ad group that a new ad group ad will
     *     belong to
     */
    // [START addHotelAdGroupAd]
    private static function addHotelAdGroupAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates a new hotel ad.
        $ad = new Ad([
            'hotel_ad' => new HotelAdInfo(),
        ]);

        // Creates a new ad group ad and sets the hotel ad to it.
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
            "Added a hotel ad group ad with resource name '%s'.%s",
            $addedAdGroupAd->getResourceName(),
            PHP_EOL
        );
    }
    // [END addHotelAdGroupAd]
}

AddHotelAds::main();

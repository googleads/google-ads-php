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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Common\Ad;
use Google\Ads\GoogleAds\V0\Common\HotelAdInfo;
use Google\Ads\GoogleAds\V0\Common\ManualCpc;
use Google\Ads\GoogleAds\V0\Common\PercentCpc;
use Google\Ads\GoogleAds\V0\Enums\AdGroupAdStatusEnum_AdGroupAdStatus;
use Google\Ads\GoogleAds\V0\Enums\AdGroupStatusEnum_AdGroupStatus;
use Google\Ads\GoogleAds\V0\Enums\AdGroupTypeEnum_AdGroupType;
use Google\Ads\GoogleAds\V0\Enums\AdvertisingChannelTypeEnum_AdvertisingChannelType;
use Google\Ads\GoogleAds\V0\Enums\BudgetDeliveryMethodEnum_BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V0\Enums\CampaignStatusEnum_CampaignStatus;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\AdGroup;
use Google\Ads\GoogleAds\V0\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V0\Resources\Campaign;
use Google\Ads\GoogleAds\V0\Resources\Campaign_HotelSettingInfo;
use Google\Ads\GoogleAds\V0\Resources\Campaign_NetworkSettings;
use Google\Ads\GoogleAds\V0\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V0\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V0\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V0\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V0\Services\CampaignOperation;
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
     * @param int $customerId the client customer ID without hyphens
     * @param int $hotelCenterAccountId the Hotel Center account ID
     * @param int $cpcBidCeilingMicroAmount the CPC bid ceiling micro amount
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $hotelCenterAccountId,
        $cpcBidCeilingMicroAmount
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
     * @param int $customerId the client customer ID
     * @return string the resource name of the newly created budget
     */
    private static function addCampaignBudget(GoogleAdsClient $googleAdsClient, $customerId)
    {
        // Creates a campaign budget.
        $budget = new CampaignBudget();

        $wrappedName = new StringValue();
        $wrappedName->setValue('Interplanetary Cruise Budget #' . uniqid());
        $budget->setName($wrappedName);

        $budget->setDeliveryMethod(BudgetDeliveryMethodEnum_BudgetDeliveryMethod::STANDARD);

        // Sets the amount of budget.
        $wrappedAmountMicros = new Int64Value();
        $wrappedAmountMicros->setValue(50000000);
        $budget->setAmountMicros($wrappedAmountMicros);

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
     * @param int $customerId the client customer ID
     * @param string $budgetResourceName the resource name of budget for a new campaign
     * @param int $hotelCenterAccountId the Hotel Center account ID
     * @param int $cpcBidCeilingMicroAmount the CPC bid ceiling micro amount
     * @return string the resource name of the newly created campaign
     */
    // [START addHotelCampaign]
    private static function addHotelCampaign(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $budgetResourceName,
        $hotelCenterAccountId,
        $cpcBidCeilingMicroAmount
    ) {
        // Creates a campaign.
        $campaign = new Campaign();

        $wrappedName = new StringValue();
        $wrappedName->setValue('Interplanetary Cruise Campaign #' . uniqid());
        $campaign->setName($wrappedName);

        // Configures settings related to hotel campaigns including advertising channel type
        // and hotel setting info.
        $campaign->setAdvertisingChannelType(
            AdvertisingChannelTypeEnum_AdvertisingChannelType::HOTEL
        );
        $wrappedHotelCenterId = new Int64Value();
        $wrappedHotelCenterId->setValue($hotelCenterAccountId);
        $hotelSettingInfo = new Campaign_HotelSettingInfo();
        $hotelSettingInfo->setHotelCenterId($wrappedHotelCenterId);
        $campaign->setHotelSetting($hotelSettingInfo);

        // Recommendation: Set the campaign to PAUSED when creating it to prevent
        // the ads from immediately serving. Set to ENABLED once you've added
        // targeting and the ads are ready to serve.
        $campaign->setStatus(CampaignStatusEnum_CampaignStatus::PAUSED);
        // Sets the bidding strategy to PercentCpc. Only Manual CPC and Percent CPC can be used for
        // hotel campaigns.
        $percentCpc = new PercentCpc();
        $wrappedCpcBidCeilingMicros = new Int64Value();
        $wrappedCpcBidCeilingMicros->setValue($cpcBidCeilingMicroAmount);
        $percentCpc->setCpcBidCeilingMicros($wrappedCpcBidCeilingMicros);
        $campaign->setPercentCpc($percentCpc);

        // Sets the budget.
        $wrappedBudgetResourceName = new StringValue();
        $wrappedBudgetResourceName->setValue($budgetResourceName);
        $campaign->setCampaignBudget($wrappedBudgetResourceName);

        // Configures the campaign network options. Only Google Search is allowed for
        // hotel campaigns.
        $wrappedTrueValue = new BoolValue();
        $wrappedTrueValue->setValue(true);
        $networkSettings = new Campaign_NetworkSettings();
        $networkSettings->setTargetGoogleSearch($wrappedTrueValue);
        $campaign->setNetworkSettings($networkSettings);

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
     * @param int $customerId the client customer ID
     * @param string $campaignResourceName the resource name of campaign that a new ad group will
     *     belong to
     * @return string the resource name of the newly created ad group
     */
    // [START addHotelAdGroup]
    private static function addHotelAdGroup(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $campaignResourceName
    ) {
        // Creates an ad group.
        $adGroup = new AdGroup();

        $wrappedName = new StringValue();
        $wrappedName->setValue('Earth to Mars Cruise #' . uniqid());
        $adGroup->setName($wrappedName);

        // Sets the campaign.
        $wrappedCampaignResourceName = new StringValue();
        $wrappedCampaignResourceName->setValue($campaignResourceName);
        $adGroup->setCampaign($wrappedCampaignResourceName);

        // Sets the ad group type to HOTEL_ADS.
        // This cannot be set to other types.
        $adGroup->setType(AdGroupTypeEnum_AdGroupType::HOTEL_ADS);

        $wrappedCpcBidMicros = new Int64Value();
        $wrappedCpcBidMicros->setValue(10000000);
        $adGroup->setCpcBidMicros($wrappedCpcBidMicros);

        $adGroup->setStatus(AdGroupStatusEnum_AdGroupStatus::ENABLED);

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
     * @param int $customerId the client customer ID
     * @param string $adGroupResourceName the resource name of ad group that a new ad group ad will
     *     belong to
     */
    // [START addHotelAdGroupAd]
    private static function addHotelAdGroupAd(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $adGroupResourceName
    ) {
        // Creates a new hotel ad.
        $ad = new Ad();
        $ad->setHotelAd(new HotelAdInfo());

        // Creates a new ad group ad and sets the hotel ad to it.
        $adGroupAd = new AdGroupAd();
        $adGroupAd->setAd($ad);
        $adGroupAd->setStatus(AdGroupAdStatusEnum_AdGroupAdStatus::PAUSED);

        // Sets the ad group.
        $wrappedAdGroupResourceName = new StringValue();
        $wrappedAdGroupResourceName->setValue($adGroupResourceName);
        $adGroupAd->setAdGroup($wrappedAdGroupResourceName);

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

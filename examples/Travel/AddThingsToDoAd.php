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
use Google\Ads\GoogleAds\V18\Common\MaximizeConversionValue;
use Google\Ads\GoogleAds\V18\Common\TravelAdInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\Campaign\NetworkSettings;
use Google\Ads\GoogleAds\V18\Resources\Campaign\TravelCampaignSettings;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignBudgetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsRequest;
use Google\ApiCore\ApiException;

/**
 * This example creates a Things to do campaign, an ad group and a Things to do ad.
 *
 * <p> Prerequisite: You need to have an access to the Things to Do Center. The integration
 * instructions can be found at: https://support.google.com/google-ads/answer/13387362.
 */
class AddThingsToDoAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Specify your Things to Do Center account ID below.
    private const THINGS_TO_DO_CENTER_ACCOUNT_ID = 'INSERT_THINGS_TO_DO_CENTER_ACCOUNT_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::THINGS_TO_DO_CENTER_ACCOUNT_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::THINGS_TO_DO_CENTER_ACCOUNT_ID]
                    ?: self::THINGS_TO_DO_CENTER_ACCOUNT_ID
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
     * @param int $thingsToDoCenterAccountId the Things to Do Center account ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $thingsToDoCenterAccountId
    ) {
        // Creates a budget to be used by the campaign that will be created below.
        $budgetResourceName = self::addCampaignBudget($googleAdsClient, $customerId);
        // Creates a Things to do campaign.
        $campaignResourceName = self::addThingsToDoCampaign(
            $googleAdsClient,
            $customerId,
            $budgetResourceName,
            $thingsToDoCenterAccountId
        );
        // Creates an ad group.
        $adGroupResourceName =
            self::addAdGroup($googleAdsClient, $customerId, $campaignResourceName);
        // Creates an ad group ad.
        self::addAdGroupAd($googleAdsClient, $customerId, $adGroupResourceName);
    }

    /**
     * Creates a new campaign budget in the specified customer account.
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
            // Sets the amount of budget.
            'amount_micros' => 50000000,
            // Makes the budget explicitly shared. You cannot set it to `false` for Things to do
            // campaigns.
            'explicitly_shared' => true
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($budget);

        // Issues a mutate request.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        $response = $campaignBudgetServiceClient->mutateCampaignBudgets(
            MutateCampaignBudgetsRequest::build($customerId, [$campaignBudgetOperation])
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
     * Creates a new Things to do campaign in the specified customer account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $budgetResourceName the resource name of budget for a new campaign
     * @param int $thingsToDoCenterAccountId the Things to Do Center account ID
     * @return string the resource name of the newly created campaign
     */
    // [START add_things_to_do_ad]
    private static function addThingsToDoCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $budgetResourceName,
        int $thingsToDoCenterAccountId
    ) {
        // [START add_things_to_do_ad_1]
        // Creates a campaign.
        $campaign = new Campaign([
            'name' => 'Interplanetary Cruise Campaign #' . Helper::getPrintableDatetime(),
            // Configures settings related to Things to do campaigns including advertising channel
            // type, advertising channel sub type and travel campaign settings.
            'advertising_channel_type' => AdvertisingChannelType::TRAVEL,
            'advertising_channel_sub_type' => AdvertisingChannelSubType::TRAVEL_ACTIVITIES,
            'travel_campaign_settings'
                => new TravelCampaignSettings(['travel_account_id' => $thingsToDoCenterAccountId]),
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // Sets the bidding strategy to MaximizeConversionValue. Only this type can be used
            // for Things to do campaigns.
            'maximize_conversion_value' => new MaximizeConversionValue(),
            // Sets the budget.
            'campaign_budget' => $budgetResourceName,
            // Configures the campaign network options. Only Google Search is allowed for
            // Things to do campaigns.
            'network_settings' => new NetworkSettings(['target_google_search' => true])
        ]);
        // [END add_things_to_do_ad_1]

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add campaigns.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns(
            MutateCampaignsRequest::build($customerId, [$campaignOperation])
        );

        /** @var Campaign $addedCampaign */
        $addedCampaign = $response->getResults()[0];
        printf(
            "Added a Things to do campaign with resource name '%s'.%s",
            $addedCampaign->getResourceName(),
            PHP_EOL
        );

        return $addedCampaign->getResourceName();
    }
    // [END add_things_to_do_ad]

    /**
     * Creates a new ad group in the specified Things to do campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of campaign that a new ad group will
     *     belong to
     * @return string the resource name of the newly created ad group
     */
    // [START add_things_to_do_ad_2]
    private static function addAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates an ad group.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars Cruise #' . Helper::getPrintableDatetime(),
            // Sets the campaign.
            'campaign' => $campaignResourceName,
            // Sets the ad group type to TRAVEL_ADS. This cannot be set to other types.
            'type' => AdGroupType::TRAVEL_ADS,
            'status' => AdGroupStatus::ENABLED,
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add an ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups(
            MutateAdGroupsRequest::build($customerId, [$adGroupOperation])
        );

        /** @var AdGroup $addedAdGroup */
        $addedAdGroup = $response->getResults()[0];
        printf(
            "Added an ad group with resource name '%s'.%s",
            $addedAdGroup->getResourceName(),
            PHP_EOL
        );

        return $addedAdGroup->getResourceName();
    }
    // [END add_things_to_do_ad_2]

    /**
     * Creates a new ad group ad in the specified ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of ad group that a new ad group ad will
     *     belong to
     */
    // [START add_things_to_do_ad_3]
    private static function addAdGroupAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        // Creates a new ad group ad and sets a travel ad info.
        $adGroupAd = new AdGroupAd([
            'ad' => new Ad(['travel_ad' => new TravelAdInfo()]),
            // Set the ad group ad to enabled. Setting this to paused will cause an error for Things
            // to do campaigns. Pausing should happen at either the ad group or campaign level.
            'status' => AdGroupAdStatus::ENABLED,
            // Sets the ad group.
            'ad_group' => $adGroupResourceName
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add an ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        /** @var AdGroupAd $addedAdGroupAd */
        $addedAdGroupAd = $response->getResults()[0];
        printf(
            "Added an ad group ad with resource name '%s'.%s",
            $addedAdGroupAd->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_things_to_do_ad_3]
}

AddThingsToDoAd::main();

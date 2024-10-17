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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Common\ExpandedDynamicSearchAdInfo;
use Google\Ads\GoogleAds\V18\Common\ManualCpc;
use Google\Ads\GoogleAds\V18\Common\WebpageConditionInfo;
use Google\Ads\GoogleAds\V18\Common\WebpageInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\WebpageConditionOperandEnum\WebpageConditionOperand;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\Campaign\DynamicSearchAdsSetting;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaResponse;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignBudgetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignBudgetsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsResponse;
use Google\ApiCore\ApiException;

/**
 * This example adds a new dynamic search ad (DSA) and a webpage targeting criterion for the DSA.
 */
class AddDynamicSearchAds
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
        self::createExpandedDSA($googleAdsClient, $customerId, $adGroupResourceName);
        self::createWebPageCriterion($googleAdsClient, $customerId, $adGroupResourceName);
    }

    /**
     * Creates a campaign budget.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the campaign budget resource name
     */
    private static function createCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        $campaignBudget = new CampaignBudget([
            'name' => 'Interplanetary Cruise Budget #' . Helper::getPrintableDatetime(),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => 500000
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($campaignBudget);

        // Issues a mutate request to add campaign budgets.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        /** @var MutateCampaignBudgetsResponse $campaignBudgetResponse */
        $campaignBudgetResponse = $campaignBudgetServiceClient->mutateCampaignBudgets(
            MutateCampaignBudgetsRequest::build($customerId, [$campaignBudgetOperation])
        );

        $campaignBudgetResourceName = $campaignBudgetResponse->getResults()[0]->getResourceName();
        printf("Added budget named '%s'.%s", $campaignBudgetResourceName, PHP_EOL);

        return $campaignBudgetResourceName;
    }

    /**
     * Creates a campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignBudgetResourceName the resource name of the campaign budget
     * @return string the resource name of the newly created campaign
     */
    // [START add_dynamic_search_ads]
    private static function createCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignBudgetResourceName
    ) {
        $campaign = new Campaign([
            'name' => 'Interplanetary Cruise #' . Helper::getPrintableDatetime(),
            'advertising_channel_type' => AdvertisingChannelType::SEARCH,
            'status' => CampaignStatus::PAUSED,
            'manual_cpc' => new ManualCpc(),
            'campaign_budget' => $campaignBudgetResourceName,
            // Enables the campaign for DSAs.
            'dynamic_search_ads_setting' => new DynamicSearchAdsSetting([
                'domain_name' => 'example.com',
                'language_code' => 'en'
            ]),
            // Optional: Sets the start and end dates for the campaign, beginning one day from
            // now and ending a month from now.
            'start_date' => date('Ymd', strtotime('+1 day')),
            'end_date' => date('Ymd', strtotime('+1 month'))
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add campaigns.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        /** @var MutateCampaignsResponse $campaignResponse */
        $campaignResponse = $campaignServiceClient->mutateCampaigns(
            MutateCampaignsRequest::build($customerId, [$campaignOperation])
        );

        $campaignResourceName = $campaignResponse->getResults()[0]->getResourceName();
        printf("Added campaign named '%s'.%s", $campaignResourceName, PHP_EOL);

        return $campaignResourceName;
    }
    // [END add_dynamic_search_ads]

    /**
     * Creates an ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignResourceName the resource name of the campaign
     * @return string the resource name of the newly created ad group
     */
    // [START add_dynamic_search_ads_1]
    private static function createAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Constructs an ad group and sets an optional CPC value.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars Cruises #' . Helper::getPrintableDatetime(),
            'campaign' => $campaignResourceName,
            'status' => AdGroupStatus::PAUSED,
            'type' => AdGroupType::SEARCH_DYNAMIC_ADS,
            'tracking_url_template' => 'http://tracker.examples.com/traveltracker/{escapedlpurl}',
            'cpc_bid_micros' => 10000000
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add the ad groups.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        /** @var MutateAdGroupsResponse $adGroupResponse */
        $adGroupResponse = $adGroupServiceClient->mutateAdGroups(
            MutateAdGroupsRequest::build($customerId, [$adGroupOperation])
        );

        $adGroupResourceName = $adGroupResponse->getResults()[0]->getResourceName();
        printf("Added ad group named '%s'.%s", $adGroupResourceName, PHP_EOL);

        return $adGroupResourceName;
    }
    // [END add_dynamic_search_ads_1]

    /**
     * Creates an expanded dynamic search ad.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the ad group resource name
     */
    // [START add_dynamic_search_ads_2]
    private static function createExpandedDSA(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        $adGroupAd = new AdGroupAd([
            'ad_group' => $adGroupResourceName,
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => new Ad([
                'expanded_dynamic_search_ad' => new ExpandedDynamicSearchAdInfo([
                    'description' => 'Buy tickets now!'
                ])
            ])
        ]);

        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ads.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        /** @var MutateAdGroupAdsResponse $adGroupAdResponse */
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        $adGroupAdResourceName = $adGroupAdResponse->getResults()[0]->getResourceName();
        printf("Added ad group ad named '%s'.%s", $adGroupAdResourceName, PHP_EOL);

        return $adGroupAdResourceName;
    }
    // [END add_dynamic_search_ads_2]

    /**
     * Creates a webpage targeting criterion for the DSA.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupResourceName the resource name of the ad group
     */
    private static function createWebPageCriterion(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => $adGroupResourceName,
            'status' => AdGroupCriterionStatus::PAUSED,
            'cpc_bid_micros' => 10000000,
            // Sets the criterion to match a specific page URL and title.
            'webpage' => new WebpageInfo([
                'criterion_name' => 'Special Offers',
                'conditions' => [
                    new WebpageConditionInfo([
                        'operand' => WebpageConditionOperand::URL,
                        'argument' => '/specialoffers'
                    ]),
                    new WebpageConditionInfo([
                        'operand' => WebpageConditionOperand::PAGE_TITLE,
                        'argument' => 'Special Offers'
                    ])
                ]
            ])
        ]);

        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);

        // Issues a mutate request to add the ad group criterion.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        /** @var MutateAdGroupCriteriaResponse $adGroupCriterionResponse */
        $adGroupCriterionResponse = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, [$adGroupCriterionOperation])
        );

        $adGroupCriterionResourceName =
            $adGroupCriterionResponse->getResults()[0]->getResourceName();
        printf("Added ad group criterion named '%s'.%s", $adGroupCriterionResourceName, PHP_EOL);
    }
}

AddDynamicSearchAds::main();

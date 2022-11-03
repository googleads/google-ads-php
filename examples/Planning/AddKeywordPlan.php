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

namespace Google\Ads\GoogleAds\Examples\Planning;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V12\ResourceNames;
use Google\Ads\GoogleAds\V12\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V12\Enums\KeywordPlanForecastIntervalEnum\KeywordPlanForecastInterval;
use Google\Ads\GoogleAds\V12\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlan;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlanAdGroup;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlanAdGroupKeyword;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlanCampaign;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlanCampaignKeyword;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlanForecastPeriod;
use Google\Ads\GoogleAds\V12\Resources\KeywordPlanGeoTarget;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanAdGroupKeywordOperation;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanAdGroupOperation;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanCampaignKeywordOperation;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanCampaignOperation;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanOperation;
use Google\ApiCore\ApiException;

/**
 * This class creates a keyword plan, which can be reused for retrieving forecast metrics and
 * historic metrics.
 */
class AddKeywordPlan
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert
        // them into the constants above.
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
    // [START add_keyword_plan]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $keywordPlanResource = self::createKeywordPlan(
            $googleAdsClient,
            $customerId
        );

        $planCampaignResource = self::createKeywordPlanCampaign(
            $googleAdsClient,
            $customerId,
            $keywordPlanResource
        );

        $planAdGroupResource = self::createKeywordPlanAdGroup(
            $googleAdsClient,
            $customerId,
            $planCampaignResource
        );

        self::createKeywordPlanAdGroupKeywords(
            $googleAdsClient,
            $customerId,
            $planAdGroupResource
        );

        self::createKeywordPlanNegativeCampaignKeywords(
            $googleAdsClient,
            $customerId,
            $planCampaignResource
        );
    }

    /**
     * Creates a keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the newly created keyword plan resource
     */
    private static function createKeywordPlan(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a keyword plan.
        $keywordPlan = new KeywordPlan([
            'name' => 'Keyword plan for traffic estimate #' . Helper::getPrintableDatetime(),
            'forecast_period' => new KeywordPlanForecastPeriod([
                'date_interval' => KeywordPlanForecastInterval::NEXT_QUARTER
            ])
        ]);

        // Creates a keyword plan operation.
        $keywordPlanOperation = new KeywordPlanOperation();
        $keywordPlanOperation->setCreate($keywordPlan);

        // Issues a mutate request to add the keyword plan.
        $keywordPlanServiceClient = $googleAdsClient->getKeywordPlanServiceClient();
        $response = $keywordPlanServiceClient->mutateKeywordPlans(
            $customerId,
            [$keywordPlanOperation]
        );

        $resourceName = $response->getResults()[0]->getResourceName();
        printf("Created keyword plan: '%s'%s", $resourceName, PHP_EOL);

        return $resourceName;
    }

    /**
     * Creates the campaign for the keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $keywordPlanResource the keyword plan resource
     * @return string the newly created campaign resource
     */
    private static function createKeywordPlanCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $keywordPlanResource
    ) {
        // Creates a keyword plan campaign.
        $keywordPlanCampaign = new KeywordPlanCampaign([
            'name' => 'Keyword plan campaign #' . Helper::getPrintableDatetime(),
            'cpc_bid_micros' => 1000000,
            'keyword_plan_network' => KeywordPlanNetwork::GOOGLE_SEARCH,
            'keyword_plan' => $keywordPlanResource,
        ]);

        // See https://developers.google.com/adwords/api/docs/appendix/geotargeting
        // for the list of geo target IDs.
        $keywordPlanCampaign->setGeoTargets([
            new KeywordPlanGeoTarget([
                'geo_target_constant' => ResourceNames::forGeoTargetConstant(2840) // USA
            ])
        ]);

        // See https://developers.google.com/adwords/api/docs/appendix/codes-formats#languages
        // for the list of language criteria IDs.
        // Set English as a language constant.
        $keywordPlanCampaign->setLanguageConstants([ResourceNames::forLanguageConstant(1000)]);

        // Creates a keyword plan campaign operation.
        $keywordPlanCampaignOperation = new KeywordPlanCampaignOperation();
        $keywordPlanCampaignOperation->setCreate($keywordPlanCampaign);

        $keywordPlanCampaignServiceClient =
            $googleAdsClient->getKeywordPlanCampaignServiceClient();
        $response = $keywordPlanCampaignServiceClient->mutateKeywordPlanCampaigns(
            $customerId,
            [$keywordPlanCampaignOperation]
        );

        $planCampaignResource = $response->getResults()[0]->getResourceName();
        printf("Created campaign for keyword plan: '%s'%s", $planCampaignResource, PHP_EOL);

        return $planCampaignResource;
    }

    /**
     * Creates the ad group for the keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $planCampaignResource the resource name of the campaign under which the
     *     ad group is created
     * @return string the newly created ad group resource
     */

    private static function createKeywordPlanAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $planCampaignResource
    ) {
        // Creates a keyword plan ad group.
        $keywordPlanAdGroup = new KeywordPlanAdGroup([
            'name' => 'Keyword plan ad group #' . Helper::getPrintableDatetime(),
            'cpc_bid_micros' => 2500000,
            'keyword_plan_campaign' => $planCampaignResource
        ]);

        // Creates a keyword plan ad group operation.
        $keywordPlanAdGroupOperation = new KeywordPlanAdGroupOperation();
        $keywordPlanAdGroupOperation->setCreate($keywordPlanAdGroup);

        $keywordPlanAdGroupServiceClient = $googleAdsClient->getKeywordPlanAdGroupServiceClient();
        $response = $keywordPlanAdGroupServiceClient->mutateKeywordPlanAdGroups(
            $customerId,
            [$keywordPlanAdGroupOperation]
        );

        $planAdGroupResource = $response->getResults()[0]->getResourceName();
        printf("Created ad group for keyword plan: '%s'%s", $planAdGroupResource, PHP_EOL);

        return $planAdGroupResource;
    }

    /**
     * Creates ad group keywords for the keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $planAdGroupResource the resource name of the ad group under which the
     *     keywords are created
     */
    private static function createKeywordPlanAdGroupKeywords(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $planAdGroupResource
    ) {
        // Creates the ad group keywords for the keyword plan.
        $keywordPlanAdGroupKeyword1 = new KeywordPlanAdGroupKeyword([
            'text' => 'mars cruise',
            'cpc_bid_micros' => 2000000,
            'match_type' => KeywordMatchType::BROAD,
            'keyword_plan_ad_group' => $planAdGroupResource
        ]);

        $keywordPlanAdGroupKeyword2 = new KeywordPlanAdGroupKeyword([
            'text' => 'cheap cruise',
            'cpc_bid_micros' => 15000000,
            'match_type' => KeywordMatchType::PHRASE,
            'keyword_plan_ad_group' => $planAdGroupResource
        ]);

        $keywordPlanAdGroupKeyword3 = new KeywordPlanAdGroupKeyword([
            'text' => 'jupiter cruise',
            'cpc_bid_micros' => 1990000,
            'match_type' => KeywordMatchType::EXACT,
            'keyword_plan_ad_group' => $planAdGroupResource
        ]);

        $keywordPlanAdGroupKeywords =
            [$keywordPlanAdGroupKeyword1, $keywordPlanAdGroupKeyword2, $keywordPlanAdGroupKeyword3];

        // Creates an array of keyword plan ad group keyword operations.
        $keywordPlanAdGroupKeywordOperations = [];

        foreach ($keywordPlanAdGroupKeywords as $keyword) {
            $keywordPlanAdGroupKeywordOperation = new KeywordPlanAdGroupKeywordOperation();
            $keywordPlanAdGroupKeywordOperation->setCreate($keyword);
            $keywordPlanAdGroupKeywordOperations[] = $keywordPlanAdGroupKeywordOperation;
        }

        $keywordPlanAdGroupKeywordServiceClient =
            $googleAdsClient->getKeywordPlanAdGroupKeywordServiceClient();

        // Adds the keyword plan ad group keywords.
        $response = $keywordPlanAdGroupKeywordServiceClient->mutateKeywordPlanAdGroupKeywords(
            $customerId,
            $keywordPlanAdGroupKeywordOperations
        );

        /** @var KeywordPlanAdGroupKeyword $result */
        foreach ($response->getResults() as $result) {
            printf(
                "Created ad group keyword for keyword plan: '%s'%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }

    /**
     * Creates negative campaign keywords for the keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $planCampaignResource the resource name of the campaign under which
     *     the keywords are created
     */
    private static function createKeywordPlanNegativeCampaignKeywords(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $planCampaignResource
    ) {
        // Creates a negative campaign keyword for the keyword plan.
        $keywordPlanCampaignKeyword = new KeywordPlanCampaignKeyword([
            'text' => 'moon walk',
            'match_type' => KeywordMatchType::BROAD,
            'keyword_plan_campaign' => $planCampaignResource,
            'negative' => true
        ]);

        $keywordPlanCampaignKeywordOperation = new KeywordPlanCampaignKeywordOperation();
        $keywordPlanCampaignKeywordOperation->setCreate($keywordPlanCampaignKeyword);

        $keywordPlanCampaignKeywordServiceClient =
            $googleAdsClient->getKeywordPlanCampaignKeywordServiceClient();

        // Adds the negative campaign keyword.
        $response = $keywordPlanCampaignKeywordServiceClient->mutateKeywordPlanCampaignKeywords(
            $customerId,
            [$keywordPlanCampaignKeywordOperation]
        );

        /** @var KeywordPlanCampaignKeyword $result */
        foreach ($response->getResults() as $result) {
            printf(
                "Created negative campaign keyword for keyword plan: '%s'%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END add_keyword_plan]
}

AddKeywordPlan::main();

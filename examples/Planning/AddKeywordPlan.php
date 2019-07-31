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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V2\ResourceNames;
use Google\Ads\GoogleAds\V2\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V2\Enums\KeywordPlanForecastIntervalEnum\KeywordPlanForecastInterval;
use Google\Ads\GoogleAds\V2\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlan;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlanAdGroup;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlanCampaign;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlanForecastPeriod;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlanGeoTarget;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlanKeyword;
use Google\Ads\GoogleAds\V2\Resources\KeywordPlanNegativeKeyword;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanAdGroupOperation;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanCampaignOperation;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanKeywordOperation;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanNegativeKeywordOperation;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This class creates a keyword plan, which can be reused for retrieving forecast metrics and
 * historic metrics.
 */
class AddKeywordPlan
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

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
     */
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

        self::createKeywordPlanKeywords(
            $googleAdsClient,
            $customerId,
            $planAdGroupResource
        );

        self::createKeywordPlanNegativeKeywords(
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
            'name' => new StringValue(
                ['value' => 'Keyword plan for traffic estimate #' . uniqid()]
            ),
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
        printf("Created keyword plan: %s%s", $resourceName, PHP_EOL);

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
            'name' => new StringValue(['value' => 'Keyword plan campaign #' . uniqid()]),
            'cpc_bid_micros' => new Int64Value(['value' => 1000000]),
            'keyword_plan_network' => KeywordPlanNetwork::GOOGLE_SEARCH,
            'keyword_plan' => new StringValue(['value' => $keywordPlanResource]),
        ]);

        // See https://developers.google.com/adwords/api/docs/appendix/geotargeting
        // for the list of geo target IDs.
        $keywordPlanCampaign->setGeoTargets([
            new KeywordPlanGeoTarget([
                'geo_target_constant' => new StringValue(
                    ['value' => ResourceNames::forGeoTargetConstant(2840)] // USA
                )
            ])
        ]);

        // See https://developers.google.com/adwords/api/docs/appendix/codes-formats#languages
        // for the list of language criteria IDs.
        $keywordPlanCampaign->setLanguageConstants([
            new StringValue(['value' => ResourceNames::forLanguageConstant(1000)]) // English
        ]);

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
        printf("Created campaign for keyword plan: %s%s", $planCampaignResource, PHP_EOL);

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
            'name' => new StringValue(['value' => 'Keyword plan ad group #' . uniqid()]),
            'cpc_bid_micros' => new Int64Value(['value' => 2500000]),
            'keyword_plan_campaign' => new StringValue(['value' => $planCampaignResource])
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
        printf("Created ad group for keyword plan: %s%s", $planAdGroupResource, PHP_EOL);

        return $planAdGroupResource;
    }

    /**
     * Creates keywords for the keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $planAdGroupResource the resource name of the ad group under which the
     *     keywords are created
     */
    private static function createKeywordPlanKeywords(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $planAdGroupResource
    ) {
        // Creates the keywords for the keyword plan.
        $keywordPlanKeyword1 = new KeywordPlanKeyword([
            'text' => new StringValue(['value' => 'mars cruise']),
            'cpc_bid_micros' => new Int64Value(['value' => 2000000]),
            'match_type' => KeywordMatchType::BROAD,
            'keyword_plan_ad_group' => new StringValue(['value' => $planAdGroupResource])
        ]);

        $keywordPlanKeyword2 = new KeywordPlanKeyword([
            'text' => new StringValue(['value' => 'cheap cruise']),
            'cpc_bid_micros' => new Int64Value(['value' => 15000000]),
            'match_type' => KeywordMatchType::PHRASE,
            'keyword_plan_ad_group' => new StringValue(['value' => $planAdGroupResource])
        ]);

        $keywordPlanKeyword3 = new KeywordPlanKeyword([
            'text' => new StringValue(['value' => 'jupiter cruise']),
            'cpc_bid_micros' => new Int64Value(['value' => 1990000]),
            'match_type' => KeywordMatchType::EXACT,
            'keyword_plan_ad_group' => new StringValue(['value' => $planAdGroupResource])
        ]);

        $keywordPlanKeywords = [$keywordPlanKeyword1, $keywordPlanKeyword2, $keywordPlanKeyword3];

        // Creates an array of keyword plan keyword operations.
        $keywordPlanKeywordOperations = [];

        foreach ($keywordPlanKeywords as $keyword) {
            $keywordPlanKeywordOperation = new KeywordPlanKeywordOperation();
            $keywordPlanKeywordOperation->setCreate($keyword);
            $keywordPlanKeywordOperations[] = $keywordPlanKeywordOperation;
        }

        $keywordPlanKeywordServiceClient = $googleAdsClient->getKeywordPlanKeywordServiceClient();

        // Adds the keyword plan keywords.
        $response = $keywordPlanKeywordServiceClient->mutateKeywordPlanKeywords(
            $customerId,
            $keywordPlanKeywordOperations
        );

        /** @var KeywordPlanKeyword $result */
        foreach ($response->getResults() as $result) {
            printf("Created keyword for keyword plan: %s%s", $result->getResourceName(), PHP_EOL);
        }
    }

    /**
     * Creates negative keywords for the keyword plan.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $planCampaignResource the resource name of the campaign under which
     *     the keywords are created
     */
    private static function createKeywordPlanNegativeKeywords(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $planCampaignResource
    ) {
        // Creates a negative keyword for the keyword plan.
        $keywordPlanNegativeKeyword = new KeywordPlanNegativeKeyword([
            'text' => new StringValue(['value' => 'moon walk']),
            'match_type' => KeywordMatchType::BROAD,
            'keyword_plan_campaign' => new StringValue(['value' => $planCampaignResource])
        ]);

        $keywordPlanNegativeKeywordOperation = new KeywordPlanNegativeKeywordOperation();
        $keywordPlanNegativeKeywordOperation->setCreate($keywordPlanNegativeKeyword);

        $keywordPlanNegativeKeywordServiceClient =
            $googleAdsClient->getKeywordPlanNegativeKeywordServiceClient();

        // Adds the negative keyword.
        $response = $keywordPlanNegativeKeywordServiceClient->mutateKeywordPlanNegativeKeywords(
            $customerId,
            [$keywordPlanNegativeKeywordOperation]
        );

        /** @var KeywordPlanNegativeKeyword $result */
        foreach ($response->getResults() as $result) {
            printf(
                "Created negative keyword for keyword plan: %s%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }
}

AddKeywordPlan::main();

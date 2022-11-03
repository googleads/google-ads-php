<?php

/**
 * Copyright 2022 Google LLC
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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V12\ResourceNames;
use Google\Ads\GoogleAds\V12\Common\MonthlySearchVolume;
use Google\Ads\GoogleAds\V12\Enums\KeywordPlanCompetitionLevelEnum\KeywordPlanCompetitionLevel;
use Google\Ads\GoogleAds\V12\Enums\MonthOfYearEnum\MonthOfYear;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanKeywordHistoricalMetrics;
use Google\ApiCore\ApiException;

/**
 * This example generates historical metrics for a keyword plan. To create a keyword plan,
 * run AddKeywordPlan.php.
 */
class GenerateHistoricalMetrics
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const KEYWORD_PLAN_ID = 'INSERT_KEYWORD_PLAN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert
        // them into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::KEYWORD_PLAN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::KEYWORD_PLAN_ID] ?: self::KEYWORD_PLAN_ID
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
     * @param int $keywordPlanId the keyword plan ID
     */
    // [START generate_historical_metrics]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $keywordPlanId
    ) {
        $keywordPlanServiceClient = $googleAdsClient->getKeywordPlanServiceClient();

        // Issues a request to generate forecast metrics based on the specific keyword plan ID.
        $generateHistoricalMetricsResponse = $keywordPlanServiceClient->generateHistoricalMetrics(
            ResourceNames::forKeywordPlan($customerId, $keywordPlanId)
        );

        foreach ($generateHistoricalMetricsResponse->getMetrics() as $metric) {
            /** @var KeywordPlanKeywordHistoricalMetrics $metric */
            // These metrics include those for both the search query and any close
            // variants included in the response.
            $variants =
                implode(', ', iterator_to_array($metric->getCloseVariants()->getIterator()));
            printf(
                "The search query, '%s', (and the following variants: %s), generated "
                . "the following historical metrics:%s",
                $metric->getSearchQuery(),
                $variants ? "$variants" : 'None',
                PHP_EOL
            );

            // Approximate number of monthly searches on this query averaged for the past 12 months.
            printf(
                "\tApproximate monthly searches: %d.%s",
                $metric->getKeywordMetrics()->getAvgMonthlySearches(),
                PHP_EOL
            );

            // The competition level for this search query.
            printf(
                "\tCompetition level: '%s'.%s",
                KeywordPlanCompetitionLevel::name($metric->getKeywordMetrics()->getCompetition()),
                PHP_EOL
            );

            // The competition index for the query in the range [0, 100]. This shows how competitive
            // ad placement is for a keyword. The level of competition from 0-100 is determined by
            // the number of ad slots filled divided by the total number of ad slots available.
            // If not enough data is available, 0 will be returned.
            printf(
                "\tCompetition index: %d.%s",
                $metric->getKeywordMetrics()->getCompetitionIndex(),
                PHP_EOL
            );

            // Top of page bid low range (20th percentile) in micros for the keyword.
            printf(
                "\tTop of page bid low range: %d.%s",
                $metric->getKeywordMetrics()->getLowTopOfPageBidMicros(),
                PHP_EOL
            );

            // Top of page bid high range (80th percentile) in micros for the keyword.
            printf(
                "\tTop of page bid high range: %d.%s",
                $metric->getKeywordMetrics()->getHighTopOfPageBidMicros(),
                PHP_EOL
            );

            // Approximate number of searches on this query for the past twelve months.
            foreach ($metric->getKeywordMetrics()->getMonthlySearchVolumes() as $volume) {
                /** @var MonthlySearchVolume $volume */
                printf(
                    "\tApproximately %d searches in %s, %d.%s",
                    $volume->getMonthlySearches(),
                    MonthOfYear::name($volume->getMonth()),
                    $volume->getYear(),
                    PHP_EOL
                );
            }
        }
    }
    // [END generate_historical_metrics]
}

GenerateHistoricalMetrics::main();

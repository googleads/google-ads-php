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

namespace Google\Ads\GoogleAds\Examples\Planning;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\MonthlySearchVolume;
use Google\Ads\GoogleAds\V18\Enums\KeywordPlanCompetitionLevelEnum\KeywordPlanCompetitionLevel;
use Google\Ads\GoogleAds\V18\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V18\Enums\MonthOfYearEnum\MonthOfYear;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GenerateKeywordHistoricalMetricsRequest;
use Google\Ads\GoogleAds\V18\Services\GenerateKeywordHistoricalMetricsResult;
use Google\ApiCore\ApiException;

/**
 * Generates historical metrics for keyword planning.
 *
 * Guide:
 * https://developers.google.com/google-ads/api/docs/keyword-planning/generate-historical-metrics
 */
class GenerateHistoricalMetrics
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
    // [START generate_historical_metrics]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): void {
        $keywordPlanIdeaServiceClient = $googleAdsClient->getKeywordPlanIdeaServiceClient();
        // Generates keyword historical metrics based on the specified parameters.
        $response = $keywordPlanIdeaServiceClient->generateKeywordHistoricalMetrics(
            new GenerateKeywordHistoricalMetricsRequest([
                'customer_id' => $customerId,
                'keywords' => ['mars cruise', 'cheap cruise', 'jupiter cruise'],
                // See https://developers.google.com/google-ads/api/reference/data/geotargets for
                // the list of geo target IDs.
                // Geo target constant 2840 is for USA.
                'geo_target_constants' => [ResourceNames::forGeoTargetConstant(2840)],
                'keyword_plan_network' => KeywordPlanNetwork::GOOGLE_SEARCH,
                // https://developers.google.com/google-ads/api/reference/data/codes-formats#languages
                // for the list of language constant IDs.
                // Language constant 1000 is for English.
                'language' => ResourceNames::forLanguageConstant(1000)
            ])
        );

        // Iterates over the results and print its detail.
        foreach ($response->getResults() as $result) {
            /** @var GenerateKeywordHistoricalMetricsResult $result */
            $metrics = $result->getKeywordMetrics();
            printf("The search query: '%s' ", $result->getText());
            printf(
                "and the following variants: '%s' ",
                implode(',', iterator_to_array($result->getCloseVariants()->getIterator()))
            );
            print "generated the following historical metrics:" . PHP_EOL;

            // Approximate number of monthly searches on this query averaged for the past 12 months.
            printf(
                "Approximate monthly searches: %s%s",
                $metrics->hasAvgMonthlySearches()
                    ? sprintf("%d", $metrics->getAvgMonthlySearches())
                    : "'none'",
                PHP_EOL
            );

            // The competition level for this search query.
            printf(
                "Competition level: '%s'%s",
                KeywordPlanCompetitionLevel::name($metrics->getCompetition()),
                PHP_EOL
            );

            // The competition index for the query in the range [0,100]. This shows how
            // competitive ad placement is for a keyword. The level of competition from 0-100 is
            // determined by the number of ad slots filled divided by the total number of slots
            // available. If not enough data is available, null will be returned.
            printf(
                "Competition index: %s%s",
                $metrics->hasCompetitionIndex()
                    ? sprintf("%d", $metrics->getCompetitionIndex())
                    : "'none'",
                PHP_EOL
            );

            // Top of page bid low range (20th percentile) in micros for the keyword.
            printf(
                "Top of page bid low range: %s%s",
                $metrics->hasLowTopOfPageBidMicros()
                    ? sprintf("%d", $metrics->getLowTopOfPageBidMicros())
                    : "'none'",
                PHP_EOL
            );

            // Top of page bid high range (80th percentile) in micros for the keyword.
            printf(
                "Top of page bid high range: %s%s",
                $metrics->hasHighTopOfPageBidMicros()
                    ? sprintf("%d", $metrics->getHighTopOfPageBidMicros())
                    : "'none'",
                PHP_EOL
            );

            // Approximate number of searches on this query for the past twelve months.
            $monthlySearchVolumes =
                iterator_to_array($metrics->getMonthlySearchVolumes()->getIterator());
            usort(
                $monthlySearchVolumes,
                // Orders the monthly search volumes by descending year, then descending month.
                function (MonthlySearchVolume $volume1, MonthlySearchVolume $volume2) {
                    $yearsCompared = $volume2->getYear() <=> $volume1->getYear();
                    if ($yearsCompared != 0) {
                        return $yearsCompared;
                    } else {
                        return $volume2->getMonth() <=> $volume1->getMonth();
                    }
                }
            );
            // Prints each monthly search volume.
            array_walk($monthlySearchVolumes, function (MonthlySearchVolume $monthlySearchVolume) {
                printf(
                    "Approximately %d searches in %s, %s.%s",
                    $monthlySearchVolume->getMonthlySearches(),
                    MonthOfYear::name($monthlySearchVolume->getMonth()),
                    $monthlySearchVolume->getYear(),
                    PHP_EOL
                );
            });
            print PHP_EOL;
        }
    }
    // [END generate_historical_metrics]
}

GenerateHistoricalMetrics::main();

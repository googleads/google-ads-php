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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V12\ResourceNames;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanKeywordForecast;
use Google\ApiCore\ApiException;

/**
 * This code example generates forecast metrics for a keyword plan. To create a keyword plan,
 * run AddKeywordPlan.php.
 */
class GenerateForecastMetrics
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
    // [START generate_forecast_metrics]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $keywordPlanId
    ) {
        $keywordPlanServiceClient = $googleAdsClient->getKeywordPlanServiceClient();

        // Issues a request to generate forecast metrics based on the specific keyword plan ID.
        $generateForecastMetricsResponse = $keywordPlanServiceClient->generateForecastMetrics(
            ResourceNames::forKeywordPlan($customerId, $keywordPlanId)
        );

        $i = 0;
        foreach ($generateForecastMetricsResponse->getKeywordForecasts() as $forecast) {
            /** @var KeywordPlanKeywordForecast $forecast */

            $metrics = $forecast->getKeywordForecast();
            printf(
                "%d) Keyword ID: %s%s",
                ++$i,
                $forecast->getKeywordPlanAdGroupKeyword(),
                PHP_EOL
            );
            printf(
                "Estimated daily clicks: %s%s",
                is_null($metrics->getClicks()) ? 'null'
                    : sprintf("%.2f", $metrics->getClicks()),
                PHP_EOL
            );
            printf(
                "Estimated daily impressions: %s%s",
                is_null($metrics->getImpressions())
                    ? 'null' : sprintf("%.2f", $metrics->getImpressions()),
                PHP_EOL
            );
            printf(
                "Estimated average cpc (micros): %s%s",
                is_null($metrics->getAverageCpc()) ? 'null' : $metrics->getAverageCpc(),
                PHP_EOL
            );
        }
    }
    // [END generate_forecast_metrics]
}

GenerateForecastMetrics::main();

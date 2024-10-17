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
use Google\Ads\GoogleAds\V18\Common\DateRange;
use Google\Ads\GoogleAds\V18\Common\KeywordInfo;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\BiddableKeyword;
use Google\Ads\GoogleAds\V18\Services\CampaignToForecast;
use Google\Ads\GoogleAds\V18\Services\CampaignToForecast\CampaignBiddingStrategy;
use Google\Ads\GoogleAds\V18\Services\CriterionBidModifier;
use Google\Ads\GoogleAds\V18\Services\ForecastAdGroup;
use Google\Ads\GoogleAds\V18\Services\GenerateKeywordForecastMetricsRequest;
use Google\Ads\GoogleAds\V18\Services\ManualCpcBiddingStrategy;
use Google\ApiCore\ApiException;

/**
 * Generates forecast metrics for keyword planning.
 *
 * Guide:
 * https://developers.google.com/google-ads/api/docs/keyword-planning/generate-forecast-metrics
 */
class GenerateForecastMetrics
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
    // [START generate_forecast_metrics]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): void {
        $campaignToForecast = self::createCampaignToForecast();
        $keywordPlanIdeaServiceClient = $googleAdsClient->getKeywordPlanIdeaServiceClient();
        // Generates keyword forecast metrics based on the specified parameters.
        $response = $keywordPlanIdeaServiceClient->generateKeywordForecastMetrics(
            new GenerateKeywordForecastMetricsRequest([
                'customer_id' => $customerId,
                'campaign' => $campaignToForecast,
                'forecast_period' => new DateRange([
                    // Sets the forecast start date to tomorrow.
                    'start_date' => date('Ymd', strtotime('+1 day')),
                    // Sets the forecast end date to 30 days from today.
                    'end_date' => date('Ymd', strtotime('+30 days'))
                ])
            ])
        );

        $metrics = $response->getCampaignForecastMetrics();
        printf(
            "Estimated daily clicks: %s%s",
            $metrics->hasClicks() ? sprintf("%.2f", $metrics->getClicks()) : "'none'",
            PHP_EOL
        );
        printf(
            "Estimated daily impressions: %s%s",
            $metrics->hasImpressions() ? sprintf("%.2f", $metrics->getImpressions()) : "'none'",
            PHP_EOL
        );
        printf(
            "Estimated average CPC (micros): %s%s",
            $metrics->hasAverageCpcMicros()
                ? sprintf("%d", $metrics->getAverageCpcMicros()) : "'none'",
            PHP_EOL
        );
    }

    /**
     * Creates the campaign to forecast. A campaign to forecast lets you try out various
     * configurations and keywords to find the best optimization for your future campaigns. Once
     * you've found the best campaign configuration, create a serving campaign in your Google Ads
     * account with similar values and keywords. For more details, see:
     *
     * https://support.google.com/google-ads/answer/3022575
     *
     * @return CampaignToForecast the created campaign to forecast
     */
    private static function createCampaignToForecast(): CampaignToForecast
    {
        // Creates a campaign to forecast.
        $campaignToForecast = new CampaignToForecast([
            'keyword_plan_network' => KeywordPlanNetwork::GOOGLE_SEARCH,
            'bidding_strategy' => new CampaignBiddingStrategy([
                'manual_cpc_bidding_strategy' => new ManualCpcBiddingStrategy([
                    'max_cpc_bid_micros' => 1_000_000
                ])
            ]),
            // See https://developers.google.com/google-ads/api/reference/data/geotargets for the
            // list of geo target IDs.
            'geo_modifiers' => [
                new CriterionBidModifier([
                    // Geo target constant 2840 is for USA.
                    'geo_target_constant' => ResourceNames::forGeoTargetConstant(2840)
                ])
            ],
            // See
            // https://developers.google.com/google-ads/api/reference/data/codes-formats#languages
            // for the list of language criteria IDs. Language constant 1000 is for English.
            'language_constants' => [ResourceNames::forLanguageConstant(1000)],
        ]);

        // Creates forecast ad group based on themes such as creative relevance, product category,
        // or cost per click.
        $forecastAdGroup = new ForecastAdGroup([
            'biddable_keywords' => [
                new BiddableKeyword([
                    'max_cpc_bid_micros' => 2_500_000,
                    'keyword' => new KeywordInfo([
                        'text' => 'mars cruise',
                        'match_type' => KeywordMatchType::BROAD
                    ])
                ]),
                new BiddableKeyword([
                    'max_cpc_bid_micros' => 1_500_000,
                    'keyword' => new KeywordInfo([
                        'text' => 'cheap cruise',
                        'match_type' => KeywordMatchType::PHRASE
                    ])
                ]),
                new BiddableKeyword([
                    'max_cpc_bid_micros' => 1_990_000,
                    'keyword' => new KeywordInfo([
                        'text' => 'jupiter cruise',
                        'match_type' => KeywordMatchType::BROAD
                    ])
                ])
            ],
            'negative_keywords' => [
                new KeywordInfo([
                    'text' => 'moon walk',
                    'match_type' => KeywordMatchType::BROAD
                ])
            ]
        ]);
        $campaignToForecast->setAdGroups([$forecastAdGroup]);

        return $campaignToForecast;
    }
    // [END generate_forecast_metrics]
}

GenerateForecastMetrics::main();

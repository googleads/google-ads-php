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

namespace Google\Ads\GoogleAds\Examples\Reporting;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V14\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets keyword performance statistics for the 50 keywords with the most impressions
 * over the last 7 days.
 */
class GetKeywordStats
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
    // [START get_keyword_stats]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all keyword statistics.
        $query =
            "SELECT campaign.id, "
                . "campaign.name, "
                . "ad_group.id, "
                . "ad_group.name, "
                . "ad_group_criterion.criterion_id, "
                . "ad_group_criterion.keyword.text, "
                . "ad_group_criterion.keyword.match_type, "
                . "metrics.impressions, "
                . "metrics.clicks, "
                . "metrics.cost_micros "
            . "FROM keyword_view "
            . "WHERE segments.date DURING LAST_7_DAYS "
                . "AND campaign.advertising_channel_type = 'SEARCH' "
                . "AND ad_group.status = 'ENABLED' "
                . "AND ad_group_criterion.status IN ('ENABLED', 'PAUSED') "
            // Limits to the 50 keywords with the most impressions in the date range.
            . "ORDER BY metrics.impressions DESC "
            . "LIMIT 50";

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream =
            $googleAdsServiceClient->searchStream($customerId, $query);

        // Iterates over all rows in all messages and prints the requested field values for
        // the keyword in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $campaign = $googleAdsRow->getCampaign();
            $adGroup = $googleAdsRow->getAdGroup();
            $adGroupCriterion = $googleAdsRow->getAdGroupCriterion();
            $metrics = $googleAdsRow->getMetrics();
            printf(
                "Keyword text '%s' with "
                . "match type %s "
                . "and ID %d "
                . "in ad group '%s' "
                . "with ID %d "
                . "in campaign '%s' "
                . "with ID %d "
                . "had %d impression(s), "
                . "%d click(s), "
                . "and %d cost (in micros) "
                . "during the last 7 days.%s",
                $adGroupCriterion->getKeyword()->getText(),
                KeywordMatchType::name($adGroupCriterion->getKeyword()->getMatchType()),
                $adGroupCriterion->getCriterionId(),
                $adGroup->getName(),
                $adGroup->getId(),
                $campaign->getName(),
                $campaign->getId(),
                $metrics->getImpressions(),
                $metrics->getClicks(),
                $metrics->getCostMicros(),
                PHP_EOL
            );
        }
    }
    // [END get_keyword_stats]
}

GetKeywordStats::main();

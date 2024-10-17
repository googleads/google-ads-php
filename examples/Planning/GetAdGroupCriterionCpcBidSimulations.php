<?php

/**
 * Copyright 2020 Google LLC
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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V18\Common\CpcBidSimulationPoint;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * This example gets all available ad group criterion CPC bid simulations for a given ad group.
 * To get ad groups, run GetAdGroups.php.
 */
class GetAdGroupCriterionCpcBidSimulations
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $adGroupId the ad group ID to get the ad group criterion CPC bid simulations for
     */
    // [START get_ad_group_criterion_cpc_bid_simulations]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the ad group criterion CPC bid simulations.
        $query = sprintf(
            'SELECT ad_group_criterion_simulation.ad_group_id, ' .
            'ad_group_criterion_simulation.criterion_id, ' .
            'ad_group_criterion_simulation.start_date, ' .
            'ad_group_criterion_simulation.end_date, ' .
            'ad_group_criterion_simulation.cpc_bid_point_list.points ' .
            'FROM ad_group_criterion_simulation ' .
            'WHERE ad_group_criterion_simulation.type = CPC_BID ' .
            'AND ad_group_criterion_simulation.ad_group_id = %d',
            $adGroupId
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );

        // Iterates over all rows in all messages and prints the requested field values for
        // the ad group criterion CPC bid simulation in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $simulation = $googleAdsRow->getAdGroupCriterionSimulation();
            printf(
                'Found ad group criterion CPC bid simulation for ad group ID %d, ' .
                'criterion ID %d, start date "%s", end date "%s", and points:%s',
                $simulation->getAdGroupId(),
                $simulation->getCriterionId(),
                $simulation->getStartDate(),
                $simulation->getEndDate(),
                PHP_EOL
            );
            foreach ($simulation->getCpcBidPointList()->getPoints() as $point) {
                /** @var CpcBidSimulationPoint $point */
                printf(
                    '  bid: %d => clicks: %d, cost: %d, impressions: %d, ' .
                    'biddable conversions: %.2f, biddable conversions value: %.2f%s',
                    $point->getCpcBidMicros(),
                    $point->getClicks(),
                    $point->getCostMicros(),
                    $point->getImpressions(),
                    $point->getBiddableConversions(),
                    $point->getBiddableConversionsValue(),
                    PHP_EOL
                );
            }

            print PHP_EOL;
        }
    }
    // [END get_ad_group_criterion_cpc_bid_simulations]
}

GetAdGroupCriterionCpcBidSimulations::main();

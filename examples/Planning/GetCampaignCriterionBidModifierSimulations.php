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
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V13\Common\BidModifierSimulationPoint;
use Google\Ads\GoogleAds\V13\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V13\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets all available criterion bid modifier simulations for a given campaign.
 * To get campaigns, run GetCampaigns.php.
 */
class GetCampaignCriterionBidModifierSimulations
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID
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
     * @param int $campaignId the campaign ID to get the criterion bid modifier simulations
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the criterion bid modifier simulations.
        $query = sprintf(
            'SELECT campaign_criterion_simulation.criterion_id, ' .
            'campaign_criterion_simulation.start_date, ' .
            'campaign_criterion_simulation.end_date, ' .
            'campaign_criterion_simulation.bid_modifier_point_list.points ' .
            'FROM campaign_criterion_simulation ' .
            'WHERE campaign_criterion_simulation.type = BID_MODIFIER ' .
            'AND campaign_criterion_simulation.campaign_id = %d',
            $campaignId
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream($customerId, $query);

        // Iterates over all rows in all messages and prints the requested field values for
        // the campaign criterion bid modifier simulation in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $simulation = $googleAdsRow->getCampaignCriterionSimulation();
            printf(
                'Found campaign-level criterion bid modifier simulation for ' .
                'criterion with ID %d, start date "%s", end date "%s", and points:%s',
                $simulation->getCriterionId(),
                $simulation->getStartDate(),
                $simulation->getEndDate(),
                PHP_EOL
            );
            foreach ($simulation->getBidModifierPointList()->getPoints() as $point) {
                /** @var BidModifierSimulationPoint $point */
                printf(
                    '  bid modifier: %.2f => clicks: %d, cost: %d, impressions: %d, ' .
                    'parent clicks: %d, parent cost: %d, parent impressions: %d, ' .
                    'parent required budget: %d%s',
                    $point->getBidModifier(),
                    $point->getClicks(),
                    $point->getCostMicros(),
                    $point->getImpressions(),
                    $point->getParentClicks(),
                    $point->getParentCostMicros(),
                    $point->getParentImpressions(),
                    $point->getParentRequiredBudgetMicros(),
                    PHP_EOL
                );
            }

            print PHP_EOL;
        }
    }
}

GetCampaignCriterionBidModifierSimulations::main();

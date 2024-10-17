<?php

/**
 * Copyright 2021 Google LLC
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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\TargetSpend;
use Google\Ads\GoogleAds\V18\Enums\BiddingStrategyTypeEnum\BiddingStrategyType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\BiddingStrategy;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Services\BiddingStrategyOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateBiddingStrategiesRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * Adds a cross-account bidding strategy to a manager account and attaches it to a client customer's
 * campaign. Also lists all manager-owned and customer accessible bidding strategies.
 */
class UseCrossAccountBiddingStrategy
{
    private const MANAGER_CUSTOMER_ID = 'INSERT_MANAGER_CUSTOMER_ID_HERE';
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments(
            [
                ArgumentNames::MANAGER_CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
                ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
                ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
            ]
        );

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
                $options[ArgumentNames::MANAGER_CUSTOMER_ID] ?: self::MANAGER_CUSTOMER_ID,
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
     * @param int $managerCustomerId the manager customer ID
     * @param int $clientCustomerId the client customer ID
     * @param int $campaignId the ID of an existing campaign in the client customer's account
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $managerCustomerId,
        int $clientCustomerId,
        int $campaignId
    ) {
        $biddingStrategyResourceName =
            self::createBiddingStrategy($googleAdsClient, $managerCustomerId);
        self::listManagerOwnedBiddingStrategies($googleAdsClient, $managerCustomerId);
        self::listCustomerAccessibleBiddingStrategies($googleAdsClient, $clientCustomerId);
        self::attachCrossAccountBiddingStrategyToCampaign(
            $googleAdsClient,
            $clientCustomerId,
            $campaignId,
            $biddingStrategyResourceName
        );
    }

    /**
     * Creates a new TargetSpend (Maximize Clicks) cross-account bidding strategy in the manager
     * account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $managerCustomerId the manager account's customer ID
     * @return string the resource name of the newly created bidding strategy
     */
    // [START create_cross_account_strategy]
    private static function createBiddingStrategy(
        GoogleAdsClient $googleAdsClient,
        int $managerCustomerId
    ): string {
        // Creates a portfolio bidding strategy.
        // [START set_currency_code]
        $portfolioBiddingStrategy = new BiddingStrategy([
            'name' => 'Maximize Clicks #' . Helper::getPrintableDatetime(),
            'target_spend' => new TargetSpend(),
            // Optional: Sets the currency of the new bidding strategy to match the currency of the
            // client account with which this bidding strategy is shared.
            // If not provided, the bidding strategy uses the manager account's default currency.
            'currency_code' => 'USD'
        ]);
        // [END set_currency_code]

        // Constructs an operation that will create a portfolio bidding strategy.
        $biddingStrategyOperation = new BiddingStrategyOperation();
        $biddingStrategyOperation->setCreate($portfolioBiddingStrategy);

        // Issues a mutate request to create the bidding strategy.
        $biddingStrategyServiceClient = $googleAdsClient->getBiddingStrategyServiceClient();
        $response = $biddingStrategyServiceClient->mutateBiddingStrategies(
            MutateBiddingStrategiesRequest::build($managerCustomerId, [$biddingStrategyOperation])
        );
        /** @var BiddingStrategy $addedBiddingStrategy */
        $addedBiddingStrategy = $response->getResults()[0];

        // Prints out the resource name of the created bidding strategy.
        printf(
            "Created cross-account bidding strategy with resource name: '%s'.%s",
            $addedBiddingStrategy->getResourceName(),
            PHP_EOL
        );

        return $addedBiddingStrategy->getResourceName();
    }
    // [END create_cross_account_strategy]

    /**
     * Lists all cross-account bidding strategies in the specified manager account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $managerCustomerId the manager account's customer ID
     */
    // [START list_manager_strategies]
    private static function listManagerOwnedBiddingStrategies(
        GoogleAdsClient $googleAdsClient,
        int $managerCustomerId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all bidding strategies.
        $query = 'SELECT bidding_strategy.id, bidding_strategy.name, '
            . 'bidding_strategy.type, bidding_strategy.currency_code '
            . 'FROM bidding_strategy';
        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($managerCustomerId, $query)
        );

        // Iterates over all rows in all messages and prints the requested field values for
        // the bidding strategy in each row.
        printf(
            "Cross-account bid strategies in manager account ID %d:%s",
            $managerCustomerId,
            PHP_EOL
        );
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                '  ID: %1$d%2$s  Name: "%3$s"%2$s  Strategy type: "%4$s"%2$s'
                . '  Currency: "%5$s"%2$s%2$s',
                $googleAdsRow->getBiddingStrategy()->getId(),
                PHP_EOL,
                $googleAdsRow->getBiddingStrategy()->getName(),
                BiddingStrategyType::name($googleAdsRow->getBiddingStrategy()->getType()),
                $googleAdsRow->getBiddingStrategy()->getCurrencyCode()
            );
        }
    }
    // [END list_manager_strategies]

    /**
     * Lists all bidding strategies available to the specified client customer ID. This includes
     * both portfolio bidding strategies owned by the specified client customer and cross-account
     * bidding strategies shared by any of its managers.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $clientCustomerId the client account's customer ID
     */
    // [START list_accessible_strategies]
    private static function listCustomerAccessibleBiddingStrategies(
        GoogleAdsClient $googleAdsClient,
        int $clientCustomerId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all bidding strategies.
        $query = 'SELECT accessible_bidding_strategy.id, '
              . 'accessible_bidding_strategy.name, '
              . 'accessible_bidding_strategy.type, '
              . 'accessible_bidding_strategy.owner_customer_id, '
              . 'accessible_bidding_strategy.owner_descriptive_name '
              . 'FROM accessible_bidding_strategy '
            // Uncomment the following WHERE clause to filter results to *only* cross-account
            // bidding strategies shared with the current customer by a manager (and not also
            // include the current customer's portfolio bidding strategies).
            // . 'WHERE accessible_bidding_strategy.owner_customer_id != ' . $clientCustomerId
        ;
        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($clientCustomerId, $query)
        );

        // Iterates over all rows in all messages and prints the requested field values for
        // each accessible bidding strategy.
        printf(
            "All bid strategies accessible by the customer ID %d:%s",
            $clientCustomerId,
            PHP_EOL
        );
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                '  ID: %1$d%2$s  Name: "%3$s"%2$s  Strategy type: "%4$s"%2$s'
                . '  Owner customer ID: %5$d%2$s  Owner customer description: "%6$s"%2$s%2$s',
                $googleAdsRow->getAccessibleBiddingStrategy()->getId(),
                PHP_EOL,
                $googleAdsRow->getAccessibleBiddingStrategy()->getName(),
                BiddingStrategyType::name($googleAdsRow->getAccessibleBiddingStrategy()->getType()),
                $googleAdsRow->getAccessibleBiddingStrategy()->getOwnerCustomerId(),
                $googleAdsRow->getAccessibleBiddingStrategy()->getOwnerDescriptiveName()
            );
        }
    }
    // [END list_accessible_strategies]

    /**
     * Attaches the provided cross-account bidding strategy to the specified campaign to the
     * specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $clientCustomerId the customer ID
     * @param int $campaignId the campaign ID to attach the bidding strategy to
     * @param string $biddingStrategyResourceName the bidding strategy resource name to attach
     */
    // [START attach_strategy]
    private static function attachCrossAccountBiddingStrategyToCampaign(
        GoogleAdsClient $googleAdsClient,
        int $clientCustomerId,
        int $campaignId,
        string $biddingStrategyResourceName
    ) {
        // Creates a campaign using the specified campaign ID and the bidding strategy ID.
        // Note that a cross-account bidding strategy's resource name should use the
        // client's customer ID when attaching it to a campaign, not that of the manager that owns
        // the strategy.
        $campaign = new Campaign([
            'resource_name' => ResourceNames::forCampaign($clientCustomerId, $campaignId),
            'bidding_strategy' => $biddingStrategyResourceName
        ]);

        // Constructs an operation that will update the campaign with the specified resource name,
        // using the FieldMasks utility to derive the update mask. This mask tells the Google Ads
        // API which attributes of the campaign you want to change.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setUpdate($campaign);
        $campaignOperation->setUpdateMask(FieldMasks::allSetFieldsOf($campaign));

        // Issues a mutate request to update the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns(
            MutateCampaignsRequest::build($clientCustomerId, [$campaignOperation])
        );

        // Prints information about the updated campaign.
        printf(
            "Updated campaign with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END attach_strategy]
}

UseCrossAccountBiddingStrategy::main();

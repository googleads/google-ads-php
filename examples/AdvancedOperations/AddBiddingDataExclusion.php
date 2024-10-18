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
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\SeasonalityEventScopeEnum\SeasonalityEventScope;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\BiddingDataExclusion;
use Google\Ads\GoogleAds\V18\Services\BiddingDataExclusionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateBiddingDataExclusionsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds a customer-level data exclusion that excludes conversions from being used by
 * Smart Bidding for the time interval specified.
 *
 * For more information on using data exclusions, see
 * https://developers.google.com/google-ads/api/docs/campaigns/bidding/data-exclusions
 */
class AddBiddingDataExclusion
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const START_DATE_TIME = 'INSERT_START_DATE_TIME_HERE';
    private const END_DATE_TIME = 'INSERT_END_DATE_TIME_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::START_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::END_DATE_TIME => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::START_DATE_TIME] ?: self::START_DATE_TIME,
                $options[ArgumentNames::END_DATE_TIME] ?: self::END_DATE_TIME
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
     * Runs the example. Adds a "CUSTOMER" scoped data exclusion for the client customer ID and
     * dates specified.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $startDateTime the start time of the data exclusion (in yyyy-MM-dd HH:mm:ss
     *     format) in the account's timezone
     * @param string $endDateTime the end time of the data exclusion (in yyyy-MM-dd HH:mm:ss
     *     format) in the account's timezone
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $startDateTime,
        string $endDateTime
    ) {
        // [START add_bidding_data_exclusion]
        // Creates a bidding data exclusion.
        $dataExclusion = new BiddingDataExclusion([
            // A unique name is required for every data exclusion.
            'name' => 'Data exclusion #' . Helper::getPrintableDatetime(),
            // The CHANNEL scope applies the data exclusion to all campaigns of specific
            // advertising channel types. In this example, the exclusion will only apply to
            // Search campaigns. Use the CAMPAIGN scope to instead limit the scope to specific
            // campaigns.
            'scope' => SeasonalityEventScope::CHANNEL,
            'advertising_channel_types' => [AdvertisingChannelType::SEARCH],
            // If setting scope CAMPAIGN, add individual campaign resource name(s) according to
            // the commented out line below.
            // 'campaigns' => ['INSERT_CAMPAIGN_RESOURCE_NAME_HERE'],
            'start_date_time' => $startDateTime,
            'end_date_time' => $endDateTime
        ]);

        // Creates a bidding data exclusion operation.
        $biddingDataExclusionOperation = new BiddingDataExclusionOperation();
        $biddingDataExclusionOperation->setCreate($dataExclusion);

        // Submits the bidding data exclusion operation to add the bidding data exclusion.
        $biddingDataExclusionServiceClient =
            $googleAdsClient->getBiddingDataExclusionServiceClient();
        $response = $biddingDataExclusionServiceClient->mutateBiddingDataExclusions(
            MutateBiddingDataExclusionsRequest::build($customerId, [$biddingDataExclusionOperation])
        );

        printf(
            "Added bidding data exclusion with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
        // [END add_bidding_data_exclusion]
    }
}

AddBiddingDataExclusion::main();

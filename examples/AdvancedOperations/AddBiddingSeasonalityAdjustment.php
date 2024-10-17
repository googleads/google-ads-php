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
use Google\Ads\GoogleAds\V18\Resources\BiddingSeasonalityAdjustment;
use Google\Ads\GoogleAds\V18\Services\BiddingSeasonalityAdjustmentOperation;
use Google\Ads\GoogleAds\V18\Services\MutateBiddingSeasonalityAdjustmentsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds a customer-level seasonality adjustment that adjusts Smart Bidding behavior by
 * the expected change in conversion rate for the given future time interval.
 *
 * For more information on using seasonality adjustments, see
 * https://developers.google.com/google-ads/api/docs/campaigns/bidding/seasonality-adjustments
 */
class AddBiddingSeasonalityAdjustment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const START_DATE_TIME = 'INSERT_START_DATE_TIME_HERE';
    private const END_DATE_TIME = 'INSERT_END_DATE_TIME_HERE';
    private const CONVERSION_RATE_MODIFIER = 'INSERT_CONVERSION_RATE_MODIFIER_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::START_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::END_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_RATE_MODIFIER => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::END_DATE_TIME] ?: self::END_DATE_TIME,
                $options[ArgumentNames::CONVERSION_RATE_MODIFIER] ?: self::CONVERSION_RATE_MODIFIER
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
     * Runs the example. Adds a "CUSTOMER" scoped seasonality adjustment for the client customer
     * ID, dates, and conversion modifier rate specified.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $startDateTime the start time of the seasonality adjustment (in
     *     yyyy-MM-dd HH:mm:ss format) in the account's timezone
     * @param string $endDateTime the end time of the seasonality adjustment (in
     *     yyyy-MM-dd HH:mm:ss format) in the account's timezone
     * @param float $conversionRateModifier the conversion rate adjustment (an increase or a
     *     decrease), which accounts for estimated changes in conversion rate due to a future event
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $startDateTime,
        string $endDateTime,
        float $conversionRateModifier
    ) {
        // [START add_bidding_seasonality_adjustment]
        // Creates a bidding seasonality adjustment.
        $seasonalityAdjustment = new BiddingSeasonalityAdjustment([
            // A unique name is required for every seasonality adjustment.
            'name' => 'Seasonality adjustment #' . Helper::getPrintableDatetime(),
            // The CHANNEL scope applies the conversionRateModifier to all campaigns of specific
            // advertising channel types. In this example, the conversionRateModifier will only
            // apply to Search campaigns. Use the CAMPAIGN scope to instead limit the scope to
            // specific campaigns.
            'scope' => SeasonalityEventScope::CHANNEL,
            'advertising_channel_types' => [AdvertisingChannelType::SEARCH],
            // If setting scope CAMPAIGN, add individual campaign resource name(s) according to
            // the commented out line below.
            // 'campaigns' => ['INSERT_CAMPAIGN_RESOURCE_NAME_HERE'],
            'start_date_time' => $startDateTime,
            'end_date_time' => $endDateTime,
            // The conversionRateModifier is the expected future conversion rate change. When this
            // field is unset or set to 1.0, no adjustment will be applied to traffic. The allowed
            // range is 0.1 to 10.0.
            'conversion_rate_modifier' => $conversionRateModifier
        ]);

        // Creates a bidding seasonality adjustment operation.
        $biddingSeasonalityAdjustmentOperation = new BiddingSeasonalityAdjustmentOperation();
        $biddingSeasonalityAdjustmentOperation->setCreate($seasonalityAdjustment);

        // Submits the bidding seasonality adjustment operation to add the bidding seasonality
        // adjustment.
        $biddingSeasonalityAdjustmentServiceClient =
            $googleAdsClient->getBiddingSeasonalityAdjustmentServiceClient();
        $response = $biddingSeasonalityAdjustmentServiceClient->mutateBiddingSeasonalityAdjustments(
            MutateBiddingSeasonalityAdjustmentsRequest::build(
                $customerId,
                [$biddingSeasonalityAdjustmentOperation]
            )
        );

        printf(
            "Added seasonality adjustment with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
        // [END add_bidding_seasonality_adjustment]
    }
}

AddBiddingSeasonalityAdjustment::main();

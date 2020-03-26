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
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\V3\Common\DeviceInfo;
use Google\Ads\GoogleAds\V3\Common\GenderInfo;
use Google\Ads\GoogleAds\V3\Enums\DeviceEnum\Device;
use Google\Ads\GoogleAds\V3\Enums\GenderTypeEnum\GenderType;
use Google\Ads\GoogleAds\V3\Enums\ReachPlanAdLengthEnum\ReachPlanAdLength;
use Google\Ads\GoogleAds\V3\Enums\ReachPlanAgeRangeEnum\ReachPlanAgeRange;
use Google\Ads\GoogleAds\V3\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V3\Services\CampaignDuration;
use Google\Ads\GoogleAds\V3\Services\PlannableLocation;
use Google\Ads\GoogleAds\V3\Services\PlannedProduct;
use Google\Ads\GoogleAds\V3\Services\Preferences;
use Google\Ads\GoogleAds\V3\Services\ProductAllocation;
use Google\Ads\GoogleAds\V3\Services\ProductMetadata;
use Google\Ads\GoogleAds\V3\Services\ReachForecast;
use Google\Ads\GoogleAds\V3\Services\Targeting;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\Int32Value;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example demonstrates how to interact with the ReachPlanService to find plannable
 * locations and product codes, build a media plan, and generate a video ads reach forecast.
 */
class ForecastReach
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CURRENCY_CODE = 'USD';
    // You can get a valid location ID from
    // https://developers.google.com/adwords/api/docs/appendix/geotargeting or by calling
    // ListPlannableLocations on the ReachPlanService.
    private const LOCATION_ID = '2840'; // US
    private const BUDGET_MICROS = 500000000000; // 500,000

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert
        // them into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        self::showPlannableLocations($googleAdsClient);

        self::showPlannableProducts($googleAdsClient);

        self::forecastManualMix($googleAdsClient, $customerId);

        self::forecastSuggestedMix($googleAdsClient, $customerId);
    }

    /**
     * Shows map of plannable locations to their IDs.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     */
    private static function showPlannableLocations(GoogleAdsClient $googleAdsClient)
    {
        $response = $googleAdsClient->getReachPlanServiceClient()->listPlannableLocations();

        printf("Plannable Locations:%sName,\tId,\tParentCountryId%s", PHP_EOL, PHP_EOL);
        foreach ($response->getPlannableLocations() as $location) {
            /** @var PlannableLocation $location */
            printf(
                "'%s',\t%s,\t%s%s",
                $location->getNameUnwrapped(),
                $location->getIdUnwrapped(),
                $location->getParentCountryIdUnwrapped(),
                PHP_EOL
            );
        }
    }

    /**
     * Lists plannable products for a given location.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     */
    private static function showPlannableProducts(GoogleAdsClient $googleAdsClient)
    {
        $response = $googleAdsClient->getReachPlanServiceClient()->listPlannableProducts(
            new StringValue(['value' => self::LOCATION_ID])
        );

        print 'Plannable Products for Location ID ' . self::LOCATION_ID . ':' . PHP_EOL;
        foreach ($response->getProductMetadata() as $product) {
            /** @var ProductMetadata $product */
            print $product->getPlannableProductCodeUnwrapped() . ':' . PHP_EOL;
            print 'Age Ranges:' . PHP_EOL;
            foreach ($product->getPlannableTargeting()->getAgeRanges() as $ageRange) {
                /** @var ReachPlanAgeRange $ageRange */
                printf("\t- %s%s", ReachPlanAgeRange::name($ageRange), PHP_EOL);
            }
            print 'Genders:' . PHP_EOL;
            foreach ($product->getPlannableTargeting()->getGenders() as $gender) {
                /** @var GenderInfo $gender */
                printf("\t- %s%s", GenderType::name($gender->getType()), PHP_EOL);
            }
            print 'Devices:' . PHP_EOL;
            foreach ($product->getPlannableTargeting()->getDevices() as $device) {
                /** @var DeviceInfo $device */
                printf("\t- %s%s", Device::name($device->getType()), PHP_EOL);
            }
        }
    }

    /**
     * Creates a sample request for a given product mix.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $productMix the product mix for the reach forecast
     * @param string $locationId the location ID to plan for. You can get a valid location ID from
     *     https://developers.google.com/adwords/api/docs/appendix/geotargeting or
     *     by calling ListPlannableLocations on the ReachPlanService.
     * @param string $currencyCode three-character ISO 4217 currency code
     */
    private static function requestReachCurve(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $productMix,
        string $locationId,
        string $currencyCode
    ) {
        $duration = new CampaignDuration([
            // Valid durations are between 1 and 90 days.
            'duration_in_days' => new Int32Value(['value' => 28])
        ]);

        $targeting = new Targeting([
            'plannable_location_id' => new StringValue(['value' => $locationId]),
            'age_range' => ReachPlanAgeRange::AGE_RANGE_18_65_UP,
            'genders' => [
                new GenderInfo(['type' => GenderType::FEMALE]),
                new GenderInfo(['type' => GenderType::MALE])
            ],
            'devices' => [
                new DeviceInfo(['type' => Device::DESKTOP]),
                new DeviceInfo(['type' => Device::MOBILE]),
                new DeviceInfo(['type' => Device::TABLET])
            ]
        ]);

        // See the docs for defaults and valid ranges:
        // https://developers.google.com/google-ads/api/reference/rpc/Google.Ads.GoogleAds.V3.services#Google.Ads.GoogleAds.V3.services.GenerateReachForecastRequest
        $response = $googleAdsClient->getReachPlanServiceClient()->generateReachForecast(
            $customerId,
            new StringValue(['value' => $currencyCode]),
            $duration,
            new Int32Value(['value' => 0]),
            new Int32Value(['value' => 1]),
            $targeting,
            $productMix
        );

        printf(
            "Reach curve output:%sCurrency,\tCost Micros,\tOn-Target Reach,\tOn-Target Imprs," .
                "\tTotal Reach,\tTotal Imprs,\tProducts%s",
            PHP_EOL,
            PHP_EOL
        );
        foreach ($response->getReachCurve()->getReachForecasts() as $point) {
            $products = '';
            /** @var ReachForecast $point */
            foreach ($point->getForecastedProductAllocations() as $product) {
                /** @var ProductAllocation $product */
                $products .= sprintf(
                    '(Product: %s, Budget Micros: %s)',
                    $product->getPlannableProductCodeUnwrapped(),
                    $product->getBudgetMicrosUnwrapped()
                );
            }
            printf(
                "%s,\t%d,\t%d,\t%d,\t%d,\t%d,\t%s%s",
                $currencyCode,
                $point->getCostMicrosUnwrapped(),
                $point->getForecast()->getOnTargetReachUnwrapped(),
                $point->getForecast()->getOnTargetImpressionsUnwrapped(),
                $point->getForecast()->getTotalReachUnwrapped(),
                $point->getForecast()->getTotalImpressionsUnwrapped(),
                $products,
                PHP_EOL
            );
        }
    }

    /**
     * Pulls a forecast for product mix created manually.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    private static function forecastManualMix(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Set up a ratio to split the budget between two products.
        $trueviewAllocation = floatval(0.15);
        $bumperAllocation = floatval(1 - $trueviewAllocation);

        // See listPlannableProducts on ReachPlanService to retrieve a list
        // of valid PlannableProductCode's for a given location:
        // https://developers.google.com/google-ads/api/reference/rpc/Google.Ads.GoogleAds.V3.services#reachplanservice
        $productMix = [
            new PlannedProduct([
                'plannable_product_code' => new StringValue(['value' => 'TRUEVIEW_IN_STREAM']),
                'budget_micros' => new Int64Value([
                    'value' => self::BUDGET_MICROS * $trueviewAllocation
                ])
            ]),
            new PlannedProduct([
                'plannable_product_code' => new StringValue(['value' => 'BUMPER']),
                'budget_micros' => new Int64Value([
                    'value' => self::BUDGET_MICROS * $bumperAllocation
                ])
            ])
        ];

        self::requestReachCurve(
            $googleAdsClient,
            $customerId,
            $productMix,
            self::LOCATION_ID,
            self::CURRENCY_CODE
        );
    }

    /**
     * Pulls a forecast for a product mix based on your set of preferences.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    private static function forecastSuggestedMix(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $trueValue = new BoolValue(['value' => true]);
        $falseValue = new BoolValue(['value' => false]);

        $preferences = new Preferences([
            'has_guaranteed_price' => $trueValue,
            'starts_with_sound' => $trueValue,
            'is_skippable' => $falseValue,
            'top_content_only' => $trueValue,
            'ad_length' => ReachPlanAdLength::FIFTEEN_OR_TWENTY_SECONDS
        ]);

        $mixResponse = $googleAdsClient->getReachPlanServiceClient()->generateProductMixIdeas(
            $customerId,
            new StringValue(['value' => self::LOCATION_ID]),
            new StringValue(['value' => self::CURRENCY_CODE]),
            new Int64Value(['value' => self::BUDGET_MICROS]),
            $preferences
        );

        $productMix = [];
        foreach ($mixResponse->getProductAllocation() as $product) {
            /** @var ProductAllocation $product */
            $productMix[] = new PlannedProduct([
                'plannable_product_code' => $product->getPlannableProductCode(),
                'budget_micros' => $product->getBudgetMicros()
            ]);
        }

        self::requestReachCurve(
            $googleAdsClient,
            $customerId,
            $productMix,
            self::LOCATION_ID,
            self::CURRENCY_CODE
        );
    }
}

ForecastReach::main();

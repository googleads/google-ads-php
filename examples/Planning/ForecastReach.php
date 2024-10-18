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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Common\DeviceInfo;
use Google\Ads\GoogleAds\V18\Common\GenderInfo;
use Google\Ads\GoogleAds\V18\Enums\DeviceEnum\Device;
use Google\Ads\GoogleAds\V18\Enums\GenderTypeEnum\GenderType;
use Google\Ads\GoogleAds\V18\Enums\ReachPlanAgeRangeEnum\ReachPlanAgeRange;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\CampaignDuration;
use Google\Ads\GoogleAds\V18\Services\GenerateReachForecastRequest;
use Google\Ads\GoogleAds\V18\Services\ListPlannableLocationsRequest;
use Google\Ads\GoogleAds\V18\Services\ListPlannableProductsRequest;
use Google\Ads\GoogleAds\V18\Services\PlannableLocation;
use Google\Ads\GoogleAds\V18\Services\PlannedProduct;
use Google\Ads\GoogleAds\V18\Services\PlannedProductReachForecast;
use Google\Ads\GoogleAds\V18\Services\ProductMetadata;
use Google\Ads\GoogleAds\V18\Services\ReachForecast;
use Google\Ads\GoogleAds\V18\Services\Targeting;
use Google\ApiCore\ApiException;

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
    private const BUDGET_MICROS = 5000000; // 5

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
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        self::showPlannableLocations($googleAdsClient);
        self::showPlannableProducts($googleAdsClient);
        self::forecastManualMix($googleAdsClient, $customerId);
    }

    /**
     * Shows map of plannable locations to their IDs.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     */
    private static function showPlannableLocations(GoogleAdsClient $googleAdsClient)
    {
        $response = $googleAdsClient->getReachPlanServiceClient()->listPlannableLocations(
            new ListPlannableLocationsRequest()
        );

        printf("Plannable Locations:%sName, Id, ParentCountryId%s", PHP_EOL, PHP_EOL);
        foreach ($response->getPlannableLocations() as $location) {
            /** @var PlannableLocation $location */
            printf(
                "'%s', %s, %s%s",
                $location->getName(),
                $location->getId(),
                $location->getParentCountryId(),
                PHP_EOL
            );
        }
    }

    /**
     * Lists plannable products for a given location.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     */
    // [START forecast_reach_2]
    private static function showPlannableProducts(GoogleAdsClient $googleAdsClient)
    {
        $response = $googleAdsClient->getReachPlanServiceClient()->listPlannableProducts(
            ListPlannableProductsRequest::build(self::LOCATION_ID)
        );

        print 'Plannable Products for Location ID ' . self::LOCATION_ID . ':' . PHP_EOL;
        foreach ($response->getProductMetadata() as $product) {
            /** @var ProductMetadata $product */
            print $product->getPlannableProductCode() . ':' . PHP_EOL;
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
    // [END forecast_reach_2]

    /**
     * Retrieves and prints the reach curve for a given product mix.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $productMix the product mix for the reach forecast
     * @param string $locationId the location ID to plan for. You can get a valid location ID from
     *     https://developers.google.com/adwords/api/docs/appendix/geotargeting or
     *     by calling ListPlannableLocations on the ReachPlanService.
     * @param string $currencyCode three-character ISO 4217 currency code
     */
    // [START forecast_reach]
    private static function getReachCurve(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $productMix,
        string $locationId,
        string $currencyCode
    ) {
        // Valid durations are between 1 and 90 days.
        $duration = new CampaignDuration(['duration_in_days' => 28]);
        $targeting = new Targeting([
            'plannable_location_id' => $locationId,
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
        // https://developers.google.com/google-ads/api/reference/rpc/latest/GenerateReachForecastRequest
        $response = $googleAdsClient->getReachPlanServiceClient()->generateReachForecast(
            GenerateReachForecastRequest::build($customerId, $duration, $productMix)
                ->setCurrencyCode($currencyCode)
                ->setTargeting($targeting)
        );

        printf(
            "Reach curve output:%sCurrency, Cost Micros, On-Target Reach, On-Target Imprs," .
                " Total Reach, Total Imprs, Products%s",
            PHP_EOL,
            PHP_EOL
        );
        foreach ($response->getReachCurve()->getReachForecasts() as $point) {
            $products = '';
            /** @var ReachForecast $point */
            foreach ($point->getPlannedProductReachForecasts() as $plannedProductReachForecast) {
                /** @var PlannedProductReachForecast $plannedProductReachForecast */
                $products .= sprintf(
                    '(Product: %s, Budget Micros: %s)',
                    $plannedProductReachForecast->getPlannableProductCode(),
                    $plannedProductReachForecast->getCostMicros()
                );
            }
            printf(
                "%s, %d, %d, %d, %d, %d, %s%s",
                $currencyCode,
                $point->getCostMicros(),
                $point->getForecast()->getOnTargetReach(),
                $point->getForecast()->getOnTargetImpressions(),
                $point->getForecast()->getTotalReach(),
                $point->getForecast()->getTotalImpressions(),
                $products,
                PHP_EOL
            );
        }
    }
    // [END forecast_reach]

    /**
     * Gets a forecast for product mix created manually.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    // [START forecast_reach_3]
    private static function forecastManualMix(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Set up a ratio to split the budget between two products.
        $trueviewAllocation = floatval(0.15);
        $bumperAllocation = floatval(1 - $trueviewAllocation);

        // See listPlannableProducts on ReachPlanService to retrieve a list
        // of valid PlannableProductCode's for a given location:
        // https://developers.google.com/google-ads/api/reference/rpc/latest/ReachPlanService
        $productMix = [
            new PlannedProduct([
                'plannable_product_code' => 'TRUEVIEW_IN_STREAM',
                'budget_micros' => self::BUDGET_MICROS * $trueviewAllocation
            ]),
            new PlannedProduct([
                'plannable_product_code' => 'BUMPER',
                'budget_micros' => self::BUDGET_MICROS * $bumperAllocation
            ])
        ];

        self::getReachCurve(
            $googleAdsClient,
            $customerId,
            $productMix,
            self::LOCATION_ID,
            self::CURRENCY_CODE
        );
    }
    // [END forecast_reach_3]
}

ForecastReach::main();

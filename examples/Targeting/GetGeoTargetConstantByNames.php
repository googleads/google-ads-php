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

namespace Google\Ads\GoogleAds\Examples\Targeting;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Services\GeoTargetConstantSuggestion;
use Google\Ads\GoogleAds\V0\Services\SuggestGeoTargetConstantsRequest\LocationNames;
use Google\ApiCore\ApiException;
use Google\Protobuf\StringValue;

/**
 * This code example gets geo target constants by given location names.
 */
class GetGeoTargetConstantByNames
{
    // Locale is using ISO 639-1 format. If an invalid locale is given, 'en' will be used by
    // default.
    const LOCALE = 'en';
    // The location names to get suggested geo target constants.
    private static $LOCATION_NAMES = ['Paris', 'Quebec', 'Spain', 'Deutschland'];

    const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::LOCATION_NAMES => GetOpt::MULTIPLE_ARGUMENT,
            ArgumentNames::LOCALE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::LOCATION_NAMES] ?: self::$LOCATION_NAMES,
                $options[ArgumentNames::LOCALE] ?: self::LOCALE
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
     * @param array $locationNames the list of location names to get suggested geo target constants
     * @param string $locale the locale of the geo target constant to be retrieved
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        array $locationNames,
        $locale
    ) {
        $geoTargetConstantServiceClient = $googleAdsClient->getGeoTargetConstantServiceClient();

        $names = [];
        foreach ($locationNames as $locationName) {
            $names[] = new StringValue(['value' => $locationName]);
        }
        $response = $geoTargetConstantServiceClient->suggestGeoTargetConstants(
            new StringValue(['value' => $locale]),
            ['locationNames' => new LocationNames(['names' => $names])]
        );

        // Iterates over all geo target constant suggestion objects and prints the requested field
        // values for each one.
        foreach ($response->getGeoTargetConstantSuggestions() as $geoTargetConstantSuggestion) {
            /** @var GeoTargetConstantSuggestion $geoTargetConstantSuggestion */
            // Note that the status printed below is an enum value.
            // For example, a value of 2 will be returned when the status is 'ENABLED'.
            // A mapping of enum names to values can be found in GeoTargetConstantStatus.php.
            printf(
                "Found '%s' ('%s','%s','%s',%s) in locale '%s' with reach %d"
                . " for the search term '%s'.%s",
                $geoTargetConstantSuggestion->getGeoTargetConstant()->getResourceName(),
                $geoTargetConstantSuggestion->getGeoTargetConstant()->getName()->getValue(),
                $geoTargetConstantSuggestion->getGeoTargetConstant()->getCountryCode()->getValue(),
                $geoTargetConstantSuggestion->getGeoTargetConstant()->getTargetType()->getValue(),
                $geoTargetConstantSuggestion->getGeoTargetConstant()->getStatus(),
                $geoTargetConstantSuggestion->getLocale()->getValue(),
                $geoTargetConstantSuggestion->getReach()->getValue(),
                $geoTargetConstantSuggestion->getSearchTerm()->getValue(),
                PHP_EOL
            );
        }
    }
}

GetGeoTargetConstantByNames::main();

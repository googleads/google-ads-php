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

namespace Google\Ads\GoogleAds\Examples\Targeting;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V14\Services\GoogleAdsServiceClient;
use Google\ApiCore\ApiException;

/**
 * This example illustrates how to:
 * 1. Search for language constants where the name includes a given string.
 * 2. Search for all the available mobile carrier constants with a given country code.
 */
class SearchForLanguageAndCarrierConstants
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const LANGUAGE_NAME = 'eng';
    // A list of country codes can be referenced here:
    // https://developers.google.com/adwords/api/docs/appendix/geotargeting.
    private const CARRIER_COUNTRY_CODE = 'US';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::LANGUAGE_NAME => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CARRIER_COUNTRY_CODE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::LANGUAGE_NAME] ?: self::LANGUAGE_NAME,
                $options[ArgumentNames::CARRIER_COUNTRY_CODE] ?: self::CARRIER_COUNTRY_CODE
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
     * @param string $languageName the string included in the language name to search for
     * @param string $carrierCountryCode the code of the country where the mobile carriers are
     *      located, e.g. "US", "ES", etc.
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $languageName,
        string $carrierCountryCode
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        self::searchForLanguageConstants($googleAdsServiceClient, $customerId, $languageName);
        self::searchForCarrierConstants($googleAdsServiceClient, $customerId, $carrierCountryCode);
    }

    /**
     * Searches for language constants where the name includes a given string.
     *
     * @param GoogleAdsServiceClient $googleAdsServiceClient the Google Ads Service API client
     * @param int $customerId the customer ID
     * @param string $languageName the string included in the language name to search for
     */
    public static function searchForLanguageConstants(
        GoogleAdsServiceClient $googleAdsServiceClient,
        int $customerId,
        string $languageName
    ) {
        // Creates a query that retrieves the language constants where the name includes a given
        // string.
        $query = sprintf(
            'SELECT language_constant.id, language_constant.code, ' .
            'language_constant.name, language_constant.targetable ' .
            'FROM language_constant ' .
            'WHERE language_constant.name LIKE "%%%s%%"',
            $languageName
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream($customerId, $query);

        // Iterates over all rows in all messages and prints the requested field values for
        // the language constant in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                'Language with ID %d, code "%s", name "%s" and targetable "%s" was found.%s',
                $googleAdsRow->getLanguageConstant()->getId(),
                $googleAdsRow->getLanguageConstant()->getCode(),
                $googleAdsRow->getLanguageConstant()->getName(),
                $googleAdsRow->getLanguageConstant()->getTargetable(),
                PHP_EOL
            );
        }
    }

    /**
     * Searches for all the available mobile carrier constants with a given country code.
     *
     * @param GoogleAdsServiceClient $googleAdsServiceClient the Google Ads Service API client
     * @param int $customerId the customer ID
     * @param string $carrierCountryCode the code of the country where the mobile carriers are
     *      located, e.g. "US", "ES", etc.
     */
    public static function searchForCarrierConstants(
        GoogleAdsServiceClient $googleAdsServiceClient,
        int $customerId,
        string $carrierCountryCode
    ) {
        // Creates a query that retrieves the targetable carrier constants by country code.
        $query = sprintf(
            'SELECT carrier_constant.id, carrier_constant.name, carrier_constant.country_code ' .
            'FROM carrier_constant ' .
            'WHERE carrier_constant.country_code = "%s"',
            $carrierCountryCode
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream($customerId, $query);

        // Iterates over all rows in all messages and prints the requested field values for
        // the carrier constant in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                'Carrier with ID %d, name "%s" and country code "%s" was found.%s',
                $googleAdsRow->getCarrierConstant()->getId(),
                $googleAdsRow->getCarrierConstant()->getName(),
                $googleAdsRow->getCarrierConstant()->getCountryCode(),
                PHP_EOL
            );
        }
    }
}

SearchForLanguageAndCarrierConstants::main();

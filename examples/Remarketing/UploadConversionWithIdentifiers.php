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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V12\ResourceNames;
use Google\Ads\GoogleAds\V12\Common\UserIdentifier;
use Google\Ads\GoogleAds\V12\Enums\UserIdentifierSourceEnum\UserIdentifierSource;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Services\ClickConversion;
use Google\Ads\GoogleAds\V12\Services\ClickConversionResult;
use Google\Ads\GoogleAds\V12\Services\UploadClickConversionsResponse;
use Google\ApiCore\ApiException;

/**
 * Uploads a conversion using hashed email address instead of GCLID.
 */
class UploadConversionWithIdentifiers
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    private const EMAIL_ADDRESS = 'INSERT_EMAIL_ADDRESS_HERE';
    // The date time at which the conversion occurred.
    // Must be after the click time, and must include the time zone offset.
    // The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. '2019-01-01 12:32:45-08:00'.
    private const CONVERSION_DATE_TIME = 'INSERT_CONVERSION_DATE_TIME_HERE';
    private const CONVERSION_VALUE = 'INSERT_CONVERSION_VALUE_HERE';

    // Optional: Specifies the order ID.
    private const ORDER_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::EMAIL_ADDRESS => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_VALUE => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ORDER_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CONVERSION_ACTION_ID] ?: self::CONVERSION_ACTION_ID,
                $options[ArgumentNames::EMAIL_ADDRESS] ?: self::EMAIL_ADDRESS,
                $options[ArgumentNames::CONVERSION_DATE_TIME] ?: self::CONVERSION_DATE_TIME,
                $options[ArgumentNames::CONVERSION_VALUE] ?: self::CONVERSION_VALUE,
                $options[ArgumentNames::ORDER_ID] ?: self::ORDER_ID
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
     * @param int $conversionActionId the ID of the conversion action associated with this
     *      conversion
     * @param string $emailAddress the email address for the conversion
     * @param string $conversionDateTime the date and time of the conversion
     *      The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. “2019-01-01 12:32:45-08:00”
     * @param float $conversionValue the value of the conversion
     * @param string|null $orderId the unique order ID (transaction ID) of the conversion
     */
    // [START upload_conversion_with_identifiers]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $emailAddress,
        string $conversionDateTime,
        float $conversionValue,
        ?string $orderId
    ) {
        // [START create_conversion]
        // Creates a click conversion with the specified attributes.
        $clickConversion = new ClickConversion([
            'conversion_action' =>
                ResourceNames::forConversionAction($customerId, $conversionActionId),
            'conversion_date_time' => $conversionDateTime,
            'conversion_value' => $conversionValue,
            'currency_code' => 'USD'
        ]);

        // Sets the order ID if provided.
        if ($orderId !== null) {
            $clickConversion->setOrderId($orderId);
        }

        // Uses the SHA-256 hash algorithm for hashing user identifiers in a privacy-safe way, as
        // described at https://support.google.com/google-ads/answer/9888656.
        $hashAlgorithm = "sha256";

        // Creates a user identifier to store the hashed email address.
        $userIdentifier = new UserIdentifier([
            // Use the normalizeAndHash() method if a phone number is specified instead of the email
            // address.
            'hashed_email' => self::normalizeAndHashEmailAddress($hashAlgorithm, $emailAddress),
            // Optional: Specifies the user identifier source.
            'user_identifier_source' => UserIdentifierSource::FIRST_PARTY
        ]);

        // Adds the user identifier to the conversion.
        $clickConversion->setUserIdentifiers([$userIdentifier]);
        // [END create_conversion]

        // Issues a request to upload the click conversion.
        $conversionUploadServiceClient = $googleAdsClient->getConversionUploadServiceClient();
        /** @var UploadClickConversionsResponse $response */
        $response = $conversionUploadServiceClient->uploadClickConversions(
            $customerId,
            [$clickConversion],
            // Enables partial failure (must be true).
            true
        );

        // Prints the status message if any partial failure error is returned.
        // Note: The details of each partial failure error are not printed here, you can refer to
        // the example HandlePartialFailure.php to learn more.
        if ($response->hasPartialFailureError()) {
            printf(
                "Partial failures occurred: '%s'.%s",
                $response->getPartialFailureError()->getMessage(),
                PHP_EOL
            );
        } else {
            /** @var ClickConversionResult $clickConversionResult */
            $clickConversionResult = $response->getResults()[0];
            // Only prints valid results.
            if ($clickConversionResult->hasConversionDateTime()) {
                printf(
                    "Uploaded conversion that occurred at '%s' to '%s'.%s",
                    $clickConversionResult->getConversionDateTime(),
                    $clickConversionResult->getConversionAction(),
                    PHP_EOL
                );
            }
        }
    }
    // [END upload_conversion_with_identifiers]

    /**
     * Returns the result of normalizing and then hashing the string using the provided hash
     * algorithm. Private customer data must be hashed during upload, as described at
     * https://support.google.com/google-ads/answer/7474263.
     *
     * @param string $hashAlgorithm the hash algorithm to use
     * @param string $value the value to normalize and hash
     * @return string the normalized and hashed value
     */
    // [START normalize_and_hash]
    private static function normalizeAndHash(string $hashAlgorithm, string $value): string
    {
        return hash($hashAlgorithm, strtolower(trim($value)));
    }

    /**
     * Returns the result of normalizing and hashing an email address. For this use case, Google
     * Ads requires removal of any '.' characters preceding "gmail.com" or "googlemail.com".
     *
     * @param string $hashAlgorithm the hash algorithm to use
     * @param string $emailAddress the email address to normalize and hash
     * @return string the normalized and hashed email address
     */
    private static function normalizeAndHashEmailAddress(
        string $hashAlgorithm,
        string $emailAddress
    ): string {
        $normalizedEmail = strtolower($emailAddress);
        $emailParts = explode("@", $normalizedEmail);
        if (
            count($emailParts) > 1
            && preg_match('/^(gmail|googlemail)\.com\s*/', $emailParts[1])
        ) {
            // Removes any '.' characters from the portion of the email address before the domain
            // if the domain is gmail.com or googlemail.com.
            $emailParts[0] = str_replace(".", "", $emailParts[0]);
            $normalizedEmail = sprintf('%s@%s', $emailParts[0], $emailParts[1]);
        }
        return self::normalizeAndHash($hashAlgorithm, $normalizedEmail);
    }
    // [END normalize_and_hash]
}

UploadConversionWithIdentifiers::main();

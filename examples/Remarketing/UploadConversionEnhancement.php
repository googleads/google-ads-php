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
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V13\ResourceNames;
use Google\Ads\GoogleAds\V13\Common\OfflineUserAddressInfo;
use Google\Ads\GoogleAds\V13\Common\UserIdentifier;
use Google\Ads\GoogleAds\V13\Enums\ConversionAdjustmentTypeEnum\ConversionAdjustmentType;
use Google\Ads\GoogleAds\V13\Enums\UserIdentifierSourceEnum\UserIdentifierSource;
use Google\Ads\GoogleAds\V13\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V13\Services\ConversionAdjustment;
use Google\Ads\GoogleAds\V13\Services\ConversionAdjustmentResult;
use Google\Ads\GoogleAds\V13\Services\GclidDateTimePair;
use Google\Ads\GoogleAds\V13\Services\RestatementValue;
use Google\ApiCore\ApiException;

/**
 * This example adjusts an existing conversion by supplying user identifiers so Google can enhance
 * the conversion value.
 */
class UploadConversionEnhancement
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    private const ORDER_ID = 'INSERT_ORDER_ID_HERE';

    // Optional parameters.

    // The date time at which the conversion with the specified order ID occurred.
    // Must be after the click time, and must include the time zone offset.
    // The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. '2019-01-01 12:32:45-08:00'.
    // Setting this field is optional, but recommended.
    private const CONVERSION_DATE_TIME = null;
    private const USER_AGENT = null;
    private const RESTATEMENT_VALUE = null;
    // The currency of the restatement value.
    private const CURRENCY_CODE = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ORDER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::USER_AGENT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::RESTATEMENT_VALUE => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CURRENCY_CODE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::ORDER_ID] ?: self::ORDER_ID,
                $options[ArgumentNames::CONVERSION_DATE_TIME] ?: self::CONVERSION_DATE_TIME,
                $options[ArgumentNames::USER_AGENT] ?: self::USER_AGENT,
                $options[ArgumentNames::RESTATEMENT_VALUE] ?: self::RESTATEMENT_VALUE,
                $options[ArgumentNames::CURRENCY_CODE] ?: self::CURRENCY_CODE
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
     * @param string $orderId the unique order ID (transaction ID) of the conversion
     * @param string|null $conversionDateTime the date and time of the conversion.
     *      The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. “2019-01-01 12:32:45-08:00”
     * @param string|null $userAgent the HTTP user agent of the conversion
     * @param float|null $restatementValue the enhancement value
     * @param string|null $restatementCurrencyCode the currency of the enhancement value
     */
    // [START upload_conversion_enhancement]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $orderId,
        ?string $conversionDateTime,
        ?string $userAgent,
        ?float $restatementValue,
        ?string $restatementCurrencyCode
    ) {
        // [START create_adjustment]
        // Creates the conversion enhancement.
        $conversionAdjustment = new ConversionAdjustment([
            'conversion_action' =>
                ResourceNames::forConversionAction($customerId, $conversionActionId),
            'adjustment_type' => ConversionAdjustmentType::ENHANCEMENT,
            // Enhancements must use order ID instead of GCLID date/time pair.
            'order_id' => $orderId
        ]);

        // Uses the SHA-256 hash algorithm for hashing user identifiers in a privacy-safe way, as
        // described at https://support.google.com/google-ads/answer/9888656.
        $hashAlgorithm = "sha256";

        // Adds user identifiers, hashing where required.

        // Creates a user identifier using sample values for the user address.
        $addressIdentifier = new UserIdentifier([
            'address_info' => new OfflineUserAddressInfo([
                'hashed_first_name' => self::normalizeAndHash($hashAlgorithm, 'Joanna'),
                'hashed_last_name' => self::normalizeAndHash($hashAlgorithm, 'Smith'),
                'hashed_street_address' => self::normalizeAndHash(
                    $hashAlgorithm,
                    '1600 Amphitheatre Pkwy'
                ),
                'city' => 'Mountain View',
                'state' => 'CA',
                'postal_code' => '94043',
                'country_code' => 'US'
            ]),
            // Optional: Specifies the user identifier source.
            'user_identifier_source' => UserIdentifierSource::FIRST_PARTY
        ]);

        // Creates a user identifier using the hashed email address.
        $emailIdentifier = new UserIdentifier([
            // Uses the normalize and hash method specifically for email addresses.
            'hashed_email' => self::normalizeAndHashEmailAddress(
                $hashAlgorithm,
                'joannasmith@example.com'
            ),
            // Optional: Specifies the user identifier source.
            'user_identifier_source' => UserIdentifierSource::FIRST_PARTY
        ]);

        // Adds the user identifiers to the enhancement adjustment.
        $conversionAdjustment->setUserIdentifiers([$addressIdentifier, $emailIdentifier]);

        // Sets optional fields where a value was provided.

        if ($conversionDateTime !== null) {
            // Sets the conversion date and time if provided. Providing this value is optional but
            // recommended.
            $conversionAdjustment->setGclidDateTimePair(new GclidDateTimePair([
                'conversion_date_time' => $conversionDateTime
            ]));
        }

        if ($userAgent !== null) {
            // Sets the user agent. This should match the user agent of the request that sent the
            // original conversion so the conversion and its enhancement are either both attributed
            // as same-device or both attributed as cross-device.
            $conversionAdjustment->setUserAgent($userAgent);
        }

        if ($restatementValue !== null) {
            // Sets the new value of the conversion.
            $restatementValue = new RestatementValue([
                'adjusted_value' => $restatementValue
            ]);
            // Sets the currency of the new value, if provided. Otherwise, the default currency
            // from the conversion action is used, and if that is not set then the account currency
            // is used.
            if ($restatementCurrencyCode !== null) {
                $restatementValue->setCurrencyCode($restatementCurrencyCode);
            }
            $conversionAdjustment->setRestatementValue($restatementValue);
        }
        // [END create_adjustment]

        // Issues a request to upload the conversion enhancement.
        $conversionAdjustmentUploadServiceClient =
            $googleAdsClient->getConversionAdjustmentUploadServiceClient();
        $response = $conversionAdjustmentUploadServiceClient->uploadConversionAdjustments(
            $customerId,
            [$conversionAdjustment],
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
            // Prints the result if exists.
            /** @var ConversionAdjustmentResult $uploadedConversionAdjustment */
            $uploadedConversionAdjustment = $response->getResults()[0];
            printf(
                "Uploaded conversion adjustment of '%s' for order ID '%s'.%s",
                $uploadedConversionAdjustment->getConversionAction(),
                $uploadedConversionAdjustment->getOrderId(),
                PHP_EOL
            );
        }
    }
    // [END upload_conversion_enhancement]

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

UploadConversionEnhancement::main();

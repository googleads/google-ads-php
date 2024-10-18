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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\OfflineUserAddressInfo;
use Google\Ads\GoogleAds\V18\Common\UserIdentifier;
use Google\Ads\GoogleAds\V18\Enums\ConversionAdjustmentTypeEnum\ConversionAdjustmentType;
use Google\Ads\GoogleAds\V18\Enums\UserIdentifierSourceEnum\UserIdentifierSource;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\ConversionAdjustment;
use Google\Ads\GoogleAds\V18\Services\ConversionAdjustmentResult;
use Google\Ads\GoogleAds\V18\Services\GclidDateTimePair;
use Google\Ads\GoogleAds\V18\Services\UploadConversionAdjustmentsRequest;
use Google\ApiCore\ApiException;

/**
 * Enhances a web conversion by uploading a ConversionAdjustment containing hashed user
 * identifiers and an order ID.
 */
class UploadEnhancedConversionsForWeb
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

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ORDER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::USER_AGENT => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::USER_AGENT] ?: self::USER_AGENT
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
     */
    // [START upload_conversion_enhancement]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $orderId,
        ?string $conversionDateTime,
        ?string $userAgent
    ) {
        // [START add_user_identifiers]
        // Creates the conversion enhancement.
        $enhancement =
            new ConversionAdjustment(['adjustment_type' => ConversionAdjustmentType::ENHANCEMENT]);

        // Extracts user email, phone, and address info from the raw data, normalizes and hashes it,
        // then wraps it in UserIdentifier objects.
        // Creates a separate UserIdentifier object for each. The data in this example is hardcoded,
        // but in your application you might read the raw data from an input file.

        // IMPORTANT: Since the identifier attribute of UserIdentifier
        // (https://developers.google.com/google-ads/api/reference/rpc/latest/UserIdentifier) is a
        // oneof
        // (https://protobuf.dev/programming-guides/proto3/#oneof-features), you must set only ONE
        // of hashedEmail, hashedPhoneNumber, mobileId, thirdPartyUserId, or addressInfo. Setting
        // more than one of these attributes on the same UserIdentifier will clear all the other
        // members of the oneof. For example, the following code is INCORRECT and will result in a
        // UserIdentifier with ONLY a hashedPhoneNumber.
        //
        // $incorrectlyPopulatedUserIdentifier = new UserIdentifier([
        //    'hashed_email' => '...',
        //    'hashed_phone_number' => '...'
        // ]);

        $rawRecord = [
            // Email address that includes a period (.) before the Gmail domain.
            'email' => 'alex.2@example.com',
            // Address that includes all four required elements: first name, last name, country
            // code, and postal code.
            'firstName' => 'Alex',
            'lastName' => 'Quinn',
            'countryCode' => 'US',
            'postalCode' => '94045',
            // Phone number to be converted to E.164 format, with a leading '+' as required.
            'phone' => '+1 800 5550102',
            // This example lets you input conversion details as arguments, but in reality you might
            // store this data alongside other user data, so we include it in this sample user
            // record.
            'orderId' => $orderId,
            'conversionActionId' => $conversionActionId,
            'conversionDateTime' => $conversionDateTime,
            'currencyCode' => 'USD'
        ];

        // Creates a list for the user identifiers.
        $userIdentifiers = [];

        // Uses the SHA-256 hash algorithm for hashing user identifiers in a privacy-safe way, as
        // described at https://support.google.com/google-ads/answer/9888656.
        $hashAlgorithm = "sha256";

        // Creates a user identifier using the hashed email address, using the normalize and hash
        // method specifically for email addresses.
        $emailIdentifier = new UserIdentifier([
            // Uses the normalize and hash method specifically for email addresses.
            'hashed_email' => self::normalizeAndHashEmailAddress(
                $hashAlgorithm,
                $rawRecord['email']
            ),
            // Optional: Specifies the user identifier source.
            'user_identifier_source' => UserIdentifierSource::FIRST_PARTY
        ]);
        $userIdentifiers[] = $emailIdentifier;

        // Checks if the record has a phone number, and if so, adds a UserIdentifier for it.
        if (array_key_exists('phone', $rawRecord)) {
            $hashedPhoneNumberIdentifier = new UserIdentifier([
                'hashed_phone_number' => self::normalizeAndHash(
                    $hashAlgorithm,
                    $rawRecord['phone'],
                    true
                )
            ]);
            // Adds the hashed email identifier to the user identifiers list.
            $userIdentifiers[] = $hashedPhoneNumberIdentifier;
        }

        // Checks if the record has all the required mailing address elements, and if so, adds a
        // UserIdentifier for the mailing address.
        if (array_key_exists('firstName', $rawRecord)) {
            // Checks if the record contains all the other required elements of a mailing
            // address.
            $missingAddressKeys = [];
            foreach (['lastName', 'countryCode', 'postalCode'] as $addressKey) {
                if (!array_key_exists($addressKey, $rawRecord)) {
                    $missingAddressKeys[] = $addressKey;
                }
            }
            if (!empty($missingAddressKeys)) {
                printf(
                    "Skipping addition of mailing address information because the "
                    . "following required keys are missing: %s%s",
                    json_encode($missingAddressKeys),
                    PHP_EOL
                );
            } else {
                // Creates an OfflineUserAddressInfo object that contains all the required
                // elements of a mailing address.
                $addressIdentifier = new UserIdentifier([
                    'address_info' => new OfflineUserAddressInfo([
                        'hashed_first_name' => self::normalizeAndHash(
                            $hashAlgorithm,
                            $rawRecord['firstName'],
                            false
                        ),
                        'hashed_last_name' => self::normalizeAndHash(
                            $hashAlgorithm,
                            $rawRecord['lastName'],
                            false
                        ),
                        'country_code' => $rawRecord['countryCode'],
                        'postal_code' => $rawRecord['postalCode']
                    ])
                ]);
                // Adds the address identifier to the user identifiers list.
                $userIdentifiers[] = $addressIdentifier;
            }
        }

        // Adds the user identifiers to the conversion.
        $enhancement->setUserIdentifiers($userIdentifiers);
        // [END add_user_identifiers]

        // [START add_conversion_details]
        // Sets the conversion action.
        $enhancement->setConversionAction(
            ResourceNames::forConversionAction($customerId, $rawRecord['conversionActionId'])
        );

        // Sets the order ID. Enhancements MUST use order ID instead of GCLID date/time pair.
        if (!empty($rawRecord['orderId'])) {
            $enhancement->setOrderId($rawRecord['orderId']);
        }

        // Sets the conversion date and time if provided. Providing this value is optional but
        // recommended.
        if (!empty($rawRecord['conversionDateTime'])) {
            // Sets the conversion date and time if provided. Providing this value is optional but
            // recommended.
            $enhancement->setGclidDateTimePair(new GclidDateTimePair([
                'conversion_date_time' => $rawRecord['conversionDateTime']
            ]));
        }

        // Sets the user agent if provided. This should match the user agent of the request that
        // sent the original conversion so the conversion and its enhancement are either both
        // attributed as same-device or both attributed as cross-device.
        if (!empty($rawRecord['userAgent'])) {
            $enhancement->setUserAgent($rawRecord['userAgent']);
        }
        // [END add_conversion_details]

        // [START upload_enhancement]
        // Issues a request to upload the conversion enhancement.
        $conversionAdjustmentUploadServiceClient =
            $googleAdsClient->getConversionAdjustmentUploadServiceClient();
        // NOTE: This request contains a single adjustment as a demonstration. However, if you have
        // multiple adjustments to upload, it's best to upload multiple adjustments per request
        // instead of sending a separate request per adjustment. See the following for per-request
        // limits:
        // https://developers.google.com/google-ads/api/docs/best-practices/quotas#conversion_adjustment_upload_service
        $response = $conversionAdjustmentUploadServiceClient->uploadConversionAdjustments(
            // Enables partial failure (must be true).
            UploadConversionAdjustmentsRequest::build($customerId, [$enhancement], true)
        );
        // [END upload_enhancement]

        // Prints the status message if any partial failure error is returned.
        // Note: The details of each partial failure error are not printed here, you can refer to
        // the example HandlePartialFailure.php to learn more.
        // To review the overall health of your recent uploads, see:
        // https://developers.google.com/google-ads/api/docs/conversions/upload-summaries
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

    /**
     * Returns the result of normalizing and then hashing the string using the provided hash
     * algorithm. Private customer data must be hashed during upload, as described at
     * https://support.google.com/google-ads/answer/7474263.
     *
     * @param string $hashAlgorithm the hash algorithm to use
     * @param string $value the value to normalize and hash
     * @param bool $trimIntermediateSpaces if true, removes leading, trailing, and intermediate
     *     spaces from the string before hashing. If false, only removes leading and trailing
     *     spaces from the string before hashing.
     * @return string the normalized and hashed value
     */
    // [START normalize_and_hash]
    private static function normalizeAndHash(
        string $hashAlgorithm,
        string $value,
        bool $trimIntermediateSpaces
    ): string {
        // Normalizes by first converting all characters to lowercase, then trimming spaces.
        $normalized = strtolower($value);
        if ($trimIntermediateSpaces === true) {
            // Removes leading, trailing, and intermediate spaces.
            $normalized = str_replace(' ', '', $normalized);
        } else {
            // Removes only leading and trailing spaces.
            $normalized = trim($normalized);
        }
        return hash($hashAlgorithm, strtolower(trim($normalized)));
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
        return self::normalizeAndHash($hashAlgorithm, $normalizedEmail, true);
    }
    // [END normalize_and_hash]
}

UploadEnhancedConversionsForWeb::main();

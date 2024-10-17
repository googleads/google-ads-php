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
use Google\Ads\GoogleAds\V18\Common\Consent;
use Google\Ads\GoogleAds\V18\Common\OfflineUserAddressInfo;
use Google\Ads\GoogleAds\V18\Common\UserIdentifier;
use Google\Ads\GoogleAds\V18\Enums\ConsentStatusEnum\ConsentStatus;
use Google\Ads\GoogleAds\V18\Enums\UserIdentifierSourceEnum\UserIdentifierSource;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\ClickConversion;
use Google\Ads\GoogleAds\V18\Services\ClickConversionResult;
use Google\Ads\GoogleAds\V18\Services\UploadClickConversionsRequest;
use Google\ApiCore\ApiException;

/**
 * Uploads an enhanced conversion for leads by uploading a ClickConversion with hashed, first-party
 * user-provided data from your website lead forms. This includes user identifiers, and optionally a
 * click ID and order ID. With this information, Google can tie the conversion to the ad that drove
 * the lead.
 */
class UploadEnhancedConversionsForLeads
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    // The date time at which the conversion occurred.
    // Must be after the click time, and must include the time zone offset.
    // The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. '2019-01-01 12:32:45-08:00'.
    private const CONVERSION_DATE_TIME = 'INSERT_CONVERSION_DATE_TIME_HERE';
    private const CONVERSION_VALUE = 'INSERT_CONVERSION_VALUE_HERE';

    // Optional: Specifies the order ID.
    private const ORDER_ID = null;
    // Optional: The Google Click ID for which conversions are uploaded.
    private const GCLID = null;
    // Optional: The consent status for ad user data.
    private const AD_USER_DATA_CONSENT = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_VALUE => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ORDER_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::GCLID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::AD_USER_DATA_CONSENT => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CONVERSION_DATE_TIME] ?: self::CONVERSION_DATE_TIME,
                $options[ArgumentNames::CONVERSION_VALUE] ?: self::CONVERSION_VALUE,
                $options[ArgumentNames::ORDER_ID] ?: self::ORDER_ID,
                $options[ArgumentNames::GCLID] ?: self::GCLID,
                $options[ArgumentNames::AD_USER_DATA_CONSENT]
                    ? ConsentStatus::value($options[ArgumentNames::AD_USER_DATA_CONSENT])
                    : self::AD_USER_DATA_CONSENT
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
     * @param string $conversionDateTime the date and time of the conversion
     *      The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. “2019-01-01 12:32:45-08:00”
     * @param float $conversionValue the value of the conversion
     * @param string|null $orderId the unique order ID (transaction ID) of the conversion
     * @param string|null $gclid the Google click ID of the conversion
     * @param int|null $adUserDataConsent the ad user data consent for the click
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $conversionDateTime,
        float $conversionValue,
        ?string $orderId,
        ?string $gclid,
        ?int $adUserDataConsent
    ) {
        // [START add_user_identifiers]
        // Creates a click conversion with the specified attributes.
        $clickConversion = new ClickConversion();

        // Extract user email and phone from the raw data, normalize and hash it, then wrap it in
        // UserIdentifier objects. Creates a separate UserIdentifier object for each.
        // The data in this example is hardcoded, but in your application you might read the raw
        // data from an input file.

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
            // Phone number to be converted to E.164 format, with a leading '+' as required.
            'phone' => '+1 800 5550102',
            // This example lets you input conversion details as arguments, but in reality you might
            // store this data alongside other user data, so we include it in this sample user
            // record.
            'orderId' => $orderId,
            'gclid' => $gclid,
            'conversionActionId' => $conversionActionId,
            'conversionDateTime' => $conversionDateTime,
            'conversionValue' => $conversionValue,
            'currencyCode' => 'USD',
            'adUserDataConsent' => $adUserDataConsent
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

        // Adds the user identifiers to the conversion.
        $clickConversion->setUserIdentifiers($userIdentifiers);
        // [END add_user_identifiers]

        // [START add_conversion_details]
        // Adds details of the conversion.
        $clickConversion->setConversionAction(
            ResourceNames::forConversionAction($customerId, $rawRecord['conversionActionId'])
        );
        $clickConversion->setConversionDateTime($rawRecord['conversionDateTime']);
        $clickConversion->setConversionValue($rawRecord['conversionValue']);
        $clickConversion->setCurrencyCode($rawRecord['currencyCode']);

        // Sets the order ID if provided.
        if (!empty($rawRecord['orderId'])) {
            $clickConversion->setOrderId($rawRecord['orderId']);
        }

        // Sets the Google click ID (gclid) if provided.
        if (!empty($rawRecord['gclid'])) {
            $clickConversion->setGclid($rawRecord['gclid']);
        }

        // Sets the ad user data consent if provided.
        if (!empty($rawRecord['adUserDataConsent'])) {
            // Specifies whether user consent was obtained for the data you are uploading. See
            // https://www.google.com/about/company/user-consent-policy for details.
            $clickConversion->setConsent(
                new Consent(['ad_user_data' => $rawRecord['adUserDataConsent']])
            );
        }
        // [END add_conversion_details]

        // [START upload_conversion]
        // Issues a request to upload the click conversion.
        $conversionUploadServiceClient = $googleAdsClient->getConversionUploadServiceClient();
        // NOTE: This request contains a single conversion as a demonstration.  However, if you have
        // multiple conversions to upload, it's best to upload multiple conversions per request
        // instead of sending a separate request per conversion. See the following for per-request
        // limits:
        // https://developers.google.com/google-ads/api/docs/best-practices/quotas#conversion_upload_service
        $response = $conversionUploadServiceClient->uploadClickConversions(
            // Enables partial failure (must be true).
            UploadClickConversionsRequest::build($customerId, [$clickConversion], true)
        );
        // [END upload_conversion]

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
        // Normalizes by first converting all characters to lowercase, then trimming spaces.
        $normalized = strtolower($value);
        // Removes leading, trailing, and intermediate spaces.
        $normalized = str_replace(' ', '', $normalized);
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
        return self::normalizeAndHash($hashAlgorithm, $normalizedEmail);
    }
    // [END normalize_and_hash]
}

UploadEnhancedConversionsForLeads::main();

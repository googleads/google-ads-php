<?php

/**
 * Copyright 2019 Google LLC
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
use Google\Ads\GoogleAds\V18\Enums\ConsentStatusEnum\ConsentStatus;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\ClickConversion;
use Google\Ads\GoogleAds\V18\Services\ClickConversionResult;
use Google\Ads\GoogleAds\V18\Services\CustomVariable;
use Google\Ads\GoogleAds\V18\Services\UploadClickConversionsRequest;
use Google\Ads\GoogleAds\V18\Services\UploadClickConversionsResponse;
use Google\ApiCore\ApiException;

/**
 * This code example imports offline conversion values for specific clicks to your account.
 * To get Google Click ID for a click, use the "click_view" resource:
 * https://developers.google.com/google-ads/api/fields/latest/click_view.
 * To set up a conversion action, run the AddConversionAction.php example.
 */
class UploadOfflineConversion
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';

    // Set exactly one of GCLID, GBRAID, or WBRAID.
    // The Google Click ID for which conversions are uploaded.
    private const GCLID = null;
    // The GBRAID identifier for an iOS app conversion.
    private const GBRAID = null;
    // The WBRAID identifier for an iOS web conversion.
    private const WBRAID = null;
    // Optional: Specify the unique order ID for the click conversion.
    private const ORDER_ID = null;
    // The conversion date time in "yyyy-mm-dd hh:mm:ss+|-hh:mm" format.
    private const CONVERSION_DATE_TIME = 'INSERT_CONVERSION_DATE_TIME_HERE';
    private const CONVERSION_VALUE = 'INSERT_CONVERSION_VALUE_HERE';
    // Optional: Specify the conversion custom variable ID and value you want to
    // associate with the click conversion upload.
    private const CONVERSION_CUSTOM_VARIABLE_ID = null;
    private const CONVERSION_CUSTOM_VARIABLE_VALUE = null;
    // Optional: The consent status for ad user data.
    private const AD_USER_DATA_CONSENT = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::GCLID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::GBRAID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::WBRAID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::ORDER_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_VALUE => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_CUSTOM_VARIABLE_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CONVERSION_CUSTOM_VARIABLE_VALUE => GetOpt::OPTIONAL_ARGUMENT,
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
                $options[ArgumentNames::GCLID] ?: self::GCLID,
                $options[ArgumentNames::GBRAID] ?: self::GBRAID,
                $options[ArgumentNames::WBRAID] ?: self::WBRAID,
                $options[ArgumentNames::ORDER_ID] ?: self::ORDER_ID,
                $options[ArgumentNames::CONVERSION_DATE_TIME] ?: self::CONVERSION_DATE_TIME,
                $options[ArgumentNames::CONVERSION_VALUE] ?: self::CONVERSION_VALUE,
                $options[ArgumentNames::CONVERSION_CUSTOM_VARIABLE_ID]
                    ?: self::CONVERSION_CUSTOM_VARIABLE_ID,
                $options[ArgumentNames::CONVERSION_CUSTOM_VARIABLE_VALUE]
                    ?: self::CONVERSION_CUSTOM_VARIABLE_VALUE,
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
     * @param int $conversionActionId the ID of the conversion action to upload to
     * @param string|null $gclid the GCLID for the conversion (should be newer than the number of
     *     days set on the conversion window of the conversion action). If set, GBRAID and WBRAID
     *     must be null
     * @param string|null $gbraid the GBRAID identifier for an iOS app conversion. If set, GCLID and
     *     WBRAID must be null
     * @param string|null $wbraid the WBRAID identifier for an iOS web conversion. If set, GCLID and
     *     GBRAID must be null
     * @param string|null $orderId the unique ID (transaction ID) of the conversion
     * @param string $conversionDateTime the date and time of the conversion (should be after the
     *     click time). The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g.
     *     “2019-01-01 12:32:45-08:00”
     * @param float $conversionValue the value of the conversion
     * @param string|null $conversionCustomVariableId the ID of the conversion custom variable to
     *     associate with the upload
     * @param string|null $conversionCustomVariableValue the value of the conversion custom
     *     variable to associate with the upload
     * @param int|null $adUserDataConsent the ad user data consent for the click
     */
    // [START upload_offline_conversion]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        ?string $gclid,
        ?string $gbraid,
        ?string $wbraid,
        ?string $orderId,
        string $conversionDateTime,
        float $conversionValue,
        ?string $conversionCustomVariableId,
        ?string $conversionCustomVariableValue,
        ?int $adUserDataConsent
    ) {
        // Verifies that exactly one of gclid, gbraid, and wbraid is specified, as required.
        // See https://developers.google.com/google-ads/api/docs/conversions/upload-clicks for details.
        $nonNullFields = array_filter(
            [$gclid, $gbraid, $wbraid],
            function ($field) {
                return !is_null($field);
            }
        );
        if (count($nonNullFields) !== 1) {
            throw new \UnexpectedValueException(
                sprintf(
                    "Exactly 1 of gclid, gbraid or wbraid is required, but %d ID values were "
                    . "provided",
                    count($nonNullFields)
                )
            );
        }

        // Creates a click conversion by specifying currency as USD.
        $clickConversion = new ClickConversion([
            'conversion_action' =>
                ResourceNames::forConversionAction($customerId, $conversionActionId),
            'conversion_value' => $conversionValue,
            'conversion_date_time' => $conversionDateTime,
            'currency_code' => 'USD'
        ]);
        // Sets the single specified ID field.
        if (!is_null($gclid)) {
            $clickConversion->setGclid($gclid);
        } elseif (!is_null($gbraid)) {
            $clickConversion->setGbraid($gbraid);
        } else {
            $clickConversion->setWbraid($wbraid);
        }

        if (!is_null($conversionCustomVariableId) && !is_null($conversionCustomVariableValue)) {
            $clickConversion->setCustomVariables([new CustomVariable([
                'conversion_custom_variable' => ResourceNames::forConversionCustomVariable(
                    $customerId,
                    $conversionCustomVariableId
                ),
                'value' => $conversionCustomVariableValue
            ])]);
        }
        // Sets the consent information, if provided.
        if (!empty($adUserDataConsent)) {
            // Specifies whether user consent was obtained for the data you are uploading. See
            // https://www.google.com/about/company/user-consent-policy for details.
            $clickConversion->setConsent(new Consent(['ad_user_data' => $adUserDataConsent]));
        }

        if (!empty($orderId)) {
            // Sets the order ID (unique transaction ID), if provided.
            $clickConversion->setOrderId($orderId);
        }

        // Issues a request to upload the click conversion.
        $conversionUploadServiceClient = $googleAdsClient->getConversionUploadServiceClient();
        /** @var UploadClickConversionsResponse $response */
        // NOTE: This request contains a single conversion as a demonstration.  However, if you have
        // multiple conversions to upload, it's best to upload multiple conversions per request
        // instead of sending a separate request per conversion. See the following for per-request
        // limits:
        // https://developers.google.com/google-ads/api/docs/best-practices/quotas#conversion_upload_service
        $response = $conversionUploadServiceClient->uploadClickConversions(
            // Uploads the click conversion. Partial failure should always be set to true.
            UploadClickConversionsRequest::build($customerId, [$clickConversion], true)
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
            /** @var ClickConversionResult $uploadedClickConversion */
            $uploadedClickConversion = $response->getResults()[0];
            printf(
                "Uploaded click conversion that occurred at '%s' from Google Click ID '%s' " .
                "to '%s'.%s",
                $uploadedClickConversion->getConversionDateTime(),
                $uploadedClickConversion->getGclid(),
                $uploadedClickConversion->getConversionAction(),
                PHP_EOL
            );
        }
    }
    // [END upload_offline_conversion]
}

UploadOfflineConversion::main();

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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V2\GoogleAdsErrors;
use Google\Ads\GoogleAds\Util\V2\PartialFailures;
use Google\Ads\GoogleAds\Util\V2\ResourceNames;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Services\ClickConversion;
use Google\Ads\GoogleAds\V2\Services\ClickConversionResult;
use Google\Ads\GoogleAds\V2\Services\UploadClickConversionsResponse;
use Google\ApiCore\ApiException;
use Google\Protobuf\DoubleValue;
use Google\Protobuf\StringValue;

/**
 * This code example imports offline conversion values for specific clicks to your account.
 * To get Google Click ID for a click, use the "click_view" resource:
 * https://developers.google.com/google-ads/api/fields/latest/click_view.
 * To set up a conversion action, run the AddConversionAction.php example.
 */
class UploadOfflineConversion
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    const GCLID = 'INSERT_GCLID_HERE';
    const CONVERSION_DATE_TIME = 'INSERT_CONVERSION_DATE_TIME_HERE';
    const CONVERSION_VALUE = 'INSERT_CONVERSION_VALUE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::GCLID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_VALUE => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CONVERSION_DATE_TIME] ?: self::CONVERSION_DATE_TIME,
                $options[ArgumentNames::CONVERSION_VALUE] ?: self::CONVERSION_VALUE
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
     * @param int $conversionActionId the ID of the conversion action to upload to
     * @param string $gclid the GCLID for the conversion (should be newer than the number of days
     *      set on the conversion window of the conversion action)
     * @param string $conversionDateTime the date and time of the conversion (should be after the
     *      click time). The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g.
     *      “2019-01-01 12:32:45-08:00”
     * @param float $conversionValue the value of the conversion
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $gclid,
        string $conversionDateTime,
        float $conversionValue
    ) {
        $response = self::uploadClickConversion(
            $googleAdsClient,
            $customerId,
            $conversionActionId,
            $gclid,
            $conversionDateTime,
            $conversionValue
        );
        self::checkIfPartialFailureErrorExists($response);
        self::printResults($response);
    }

    /**
     * Uploads click conversion by enabling partial failure mode.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $conversionActionId the ID of the conversion action to upload to
     * @param string $gclid the GCLID for the conversion (should be newer than the number of days
     *      set on the conversion window of the conversion action)
     * @param string $conversionDateTime the date and time of the conversion (should be after the
     *      click time). The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g.
     *      “2019-01-01 12:32:45-08:00”
     * @param float $conversionValue the value of the conversion
     * @return UploadClickConversionsResponse
     */
    private static function uploadClickConversion(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $gclid,
        string $conversionDateTime,
        float $conversionValue
    ) {
        // Creates a click conversion by specifying currency as USD.
        $clickConversion = new ClickConversion([
            'conversion_action' => new StringValue([
                'value' => ResourceNames::forConversionAction($customerId, $conversionActionId)
            ]),
            'gclid' => new StringValue(['value' => $gclid]),
            'conversion_value' => new DoubleValue(['value' => $conversionValue]),
            'conversion_date_time' => new StringValue(['value' => $conversionDateTime]),
            'currency_code' => new StringValue(['value' => 'USD']),
        ]);

        // Issues a request to upload the click conversion.
        $conversionUploadServiceClient = $googleAdsClient->getConversionUploadServiceClient();
        /** @var UploadClickConversionsResponse $response */
        return $conversionUploadServiceClient->uploadClickConversions(
            $customerId,
            [$clickConversion],
            ['partialFailure' => true]
        );
    }

    /**
     * Checks if there exists partial failure error in the given upload click conversions response.
     *
     * @param UploadClickConversionsResponse $response the upload click conversions response
     */
    private static function checkIfPartialFailureErrorExists(
        UploadClickConversionsResponse $response
    ) {
        if (!is_null($response->getPartialFailureError())) {
            printf("Partial failures occurred. Details will be shown below.%s", PHP_EOL);
        } else {
            printf(
                "All operations completed successfully. No partial failures to show.%s",
                PHP_EOL
            );
        }
    }

    /**
     * Prints results of the given upload click conversions response. For those that are partial
     * failure, print all their errors with corresponding operation indices. For those that
     * succeeded, print their related information.
     *
     * @param UploadClickConversionsResponse $response the upload click conversions response
     */
    private static function printResults(UploadClickConversionsResponse $response)
    {
        // Finds the failed operations by looping through the results.
        $operationIndex = 0;
        foreach ($response->getResults() as $result) {
            /** @var ClickConversionResult $result */
            if (PartialFailures::isPartialFailure($result)) {
                $errors = GoogleAdsErrors::fromStatus(
                    $operationIndex,
                    $response->getPartialFailureError()
                );
                foreach ($errors as $error) {
                    printf(
                        "Operation %d failed with error: %s%s",
                        $operationIndex,
                        $error->getMessage(),
                        PHP_EOL
                    );
                }
            } else {
                printf(
                    "Uploaded conversion that occurred at '%s' from Google Click ID '%s' " .
                    "to '%s'.%s",
                    $result->getConversionDateTimeUnwrapped(),
                    $result->getGclidUnwrapped(),
                    $result->getConversionActionUnwrapped(),
                    PHP_EOL
                );
            }
            $operationIndex++;
        }
    }
}

UploadOfflineConversion::main();

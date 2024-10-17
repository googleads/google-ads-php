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
use Google\Ads\GoogleAds\V18\Enums\ConversionAdjustmentTypeEnum\ConversionAdjustmentType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\ConversionAdjustment;
use Google\Ads\GoogleAds\V18\Services\ConversionAdjustmentResult;
use Google\Ads\GoogleAds\V18\Services\GclidDateTimePair;
use Google\Ads\GoogleAds\V18\Services\RestatementValue;
use Google\Ads\GoogleAds\V18\Services\UploadConversionAdjustmentsRequest;
use Google\ApiCore\ApiException;

/**
 * This example imports conversion adjustments for conversions that already exist.
 * To set up a conversion action, run the AddConversionAction.php example.
 */
class UploadConversionAdjustment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    // The transaction ID of the conversion to adjust. Required if the conversion being adjusted
    // meets the criteria described at
    // https://developers.google.com/google-ads/api/docs/conversions/upload-adjustments#requirements.
    private const ORDER_ID = 'INSERT_ORDER_ID_HERE';
    // RETRACTION negates a conversion, and RESTATEMENT changes the value of a conversion.
    private const ADJUSTMENT_TYPE = "INSERT_ADJUSTMENT_TYPE_HERE";
    // The adjustment date time in "yyyy-mm-dd hh:mm:ss+|-hh:mm" format.
    private const ADJUSTMENT_DATE_TIME = "INSERT_ADJUSTMENT_DATE_TIME_HERE";
    // Optional: Specify an adjusted value below for adjustment type RESTATEMENT.
    // This value will be ignored if you specify RETRACTION as adjustment type.
    private const RESTATEMENT_VALUE = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ORDER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ADJUSTMENT_TYPE => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ADJUSTMENT_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::RESTATEMENT_VALUE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::ADJUSTMENT_TYPE] ?: self::ADJUSTMENT_TYPE,
                $options[ArgumentNames::ADJUSTMENT_DATE_TIME] ?: self::ADJUSTMENT_DATE_TIME,
                $options[ArgumentNames::RESTATEMENT_VALUE] ?: self::RESTATEMENT_VALUE
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
     * @param int $conversionActionId the ID of the conversion action to upload adjustment to
     * @param string $orderId the order ID for the conversion. Strongly recommended instead of
     *     using GCLID and conversion date time
     * @param string $adjustmentType the type of adjustment, e.g. RETRACTION, RESTATEMENT
     * @param string $adjustmentDateTime the date and time of the adjustment.
     *     The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. “2019-01-01 12:32:45-08:00”
     * @param float|null $restatementValue the adjusted value for adjustment type RESTATEMENT
     */
    // [START upload_conversion_adjustment]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $orderId,
        string $adjustmentType,
        string $adjustmentDateTime,
        ?float $restatementValue
    ) {
        $conversionAdjustmentType = ConversionAdjustmentType::value($adjustmentType);

        // Applies the conversion adjustment to the existing conversion.
        $conversionAdjustment = new ConversionAdjustment([
            'conversion_action' =>
                ResourceNames::forConversionAction($customerId, $conversionActionId),
            'adjustment_type' => $conversionAdjustmentType,
            // Sets the orderId to identify the conversion to adjust.
            'order_id' => $orderId,
            // As an alternative to setting orderId, you can provide a 'gclid_date_time_pair', but
            // setting 'order_id' instead is strongly recommended.
            // 'conversion_date_time' must be in "yyyy-mm-dd hh:mm:ss+|-hh:mm" format.
            /*
            'gclid_date_time_pair' => new GclidDateTimePair([
                'gclid' => 'INSERT_YOUR_GCLID_HERE',
                'conversion_date_time' => 'INSERT_YOUR_CONVERSION_DATE_TIME_HERE'
            ]),
            */
            'adjustment_date_time' => $adjustmentDateTime
        ]);

        // Sets adjusted value for adjustment type RESTATEMENT.
        if (
            $restatementValue !== null
            && $conversionAdjustmentType === ConversionAdjustmentType::RESTATEMENT
        ) {
            $conversionAdjustment->setRestatementValue(new RestatementValue([
                'adjusted_value' => $restatementValue
            ]));
        }

        // Issues a request to upload the conversion adjustment.
        $conversionAdjustmentUploadServiceClient =
            $googleAdsClient->getConversionAdjustmentUploadServiceClient();
        $response = $conversionAdjustmentUploadServiceClient->uploadConversionAdjustments(
            // Enables partial failure (must be true).
            UploadConversionAdjustmentsRequest::build($customerId, [$conversionAdjustment], true)
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
    // [END upload_conversion_adjustment]
}

UploadConversionAdjustment::main();

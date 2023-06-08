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
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V14\ResourceNames;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Services\CallConversion;
use Google\Ads\GoogleAds\V14\Services\CallConversionResult;
use Google\Ads\GoogleAds\V14\Services\CustomVariable;
use Google\ApiCore\ApiException;

/**
 * This example imports offline call conversion values for calls related to the ads in your account.
 * To set up a conversion action, run the AddConversionAction.php example.
 */
class UploadCallConversion
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    private const CALLER_ID = 'INSERT_CALLER_ID_HERE';
    private const CALL_START_DATE_TIME = 'INSERT_CALL_START_DATE_TIME_HERE';
    private const CONVERSION_DATE_TIME = 'INSERT_CONVERSION_DATE_TIME_HERE';
    private const CONVERSION_VALUE = 'INSERT_CONVERSION_VALUE_HERE';
    // Optional: Specify the conversion custom variable ID and value you want to
    // associate with the call conversion upload.
    private const CONVERSION_CUSTOM_VARIABLE_ID = null;
    private const CONVERSION_CUSTOM_VARIABLE_VALUE = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CALLER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CALL_START_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_DATE_TIME => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_VALUE => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_CUSTOM_VARIABLE_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CONVERSION_CUSTOM_VARIABLE_VALUE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CALLER_ID] ?: self::CALLER_ID,
                $options[ArgumentNames::CALL_START_DATE_TIME] ?: self::CALL_START_DATE_TIME,
                $options[ArgumentNames::CONVERSION_DATE_TIME] ?: self::CONVERSION_DATE_TIME,
                $options[ArgumentNames::CONVERSION_VALUE] ?: self::CONVERSION_VALUE,
                $options[ArgumentNames::CONVERSION_CUSTOM_VARIABLE_ID]
                    ?: self::CONVERSION_CUSTOM_VARIABLE_ID,
                $options[ArgumentNames::CONVERSION_CUSTOM_VARIABLE_VALUE]
                    ?: self::CONVERSION_CUSTOM_VARIABLE_VALUE
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
     * @param string $callerId the caller ID from which this call was placed. Caller ID is expected
     *     to be in E.164 format with preceding '+' sign. e.g. "+18005550100"
     * @param string $callStartDateTime the date and time at which the call occurred. The format is
     *     "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g. “2019-01-01 12:32:45-08:00”
     * @param string $conversionDateTime the date and time of the conversion (should be after the
     *     call time). The format is "yyyy-mm-dd hh:mm:ss+|-hh:mm", e.g.
     *     “2019-01-01 12:32:45-08:00”
     * @param float $conversionValue the value of the conversion
     * @param string|null $conversionCustomVariableId the ID of the conversion custom variable to
     *     associate with the upload
     * @param string|null $conversionCustomVariableValue the value of the conversion custom
     *     variable to associate with the upload
     */
    // [START upload_call_conversion]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $conversionActionId,
        string $callerId,
        string $callStartDateTime,
        string $conversionDateTime,
        float $conversionValue,
        ?string $conversionCustomVariableId,
        ?string $conversionCustomVariableValue
    ) {
        // Creates a call conversion by specifying currency as USD.
        $callConversion = new CallConversion([
            'conversion_action' =>
                ResourceNames::forConversionAction($customerId, $conversionActionId),
            'caller_id' => $callerId,
            'call_start_date_time' => $callStartDateTime,
            'conversion_date_time' => $conversionDateTime,
            'conversion_value' => $conversionValue,
            'currency_code' => 'USD'
        ]);
        if (!is_null($conversionCustomVariableId) && !is_null($conversionCustomVariableValue)) {
            $callConversion->setCustomVariables([new CustomVariable([
                'conversion_custom_variable' => ResourceNames::forConversionCustomVariable(
                    $customerId,
                    $conversionCustomVariableId
                ),
                'value' => $conversionCustomVariableValue
            ])]);
        }

        // Issues a request to upload the call conversion.
        $conversionUploadServiceClient = $googleAdsClient->getConversionUploadServiceClient();
        $response = $conversionUploadServiceClient->uploadCallConversions(
            $customerId,
            [$callConversion],
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
            /** @var CallConversionResult $uploadedCallConversion */
            $uploadedCallConversion = $response->getResults()[0];
            printf(
                "Uploaded call conversion that occurred at '%s' for caller ID '%s' to the "
                . "conversion action with resource name '%s'.%s",
                $uploadedCallConversion->getCallStartDateTime(),
                $uploadedCallConversion->getCallerId(),
                $uploadedCallConversion->getConversionAction(),
                PHP_EOL
            );
        }
    }
    // [END upload_call_conversion]
}

UploadCallConversion::main();

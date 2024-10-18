<?php

/**
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdScheduleInfo;
use Google\Ads\GoogleAds\V18\Common\CallAsset;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Enums\CallConversionReportingStateEnum\CallConversionReportingState;
use Google\Ads\GoogleAds\V18\Enums\DayOfWeekEnum\DayOfWeek;
use Google\Ads\GoogleAds\V18\Enums\MinuteOfHourEnum\MinuteOfHour;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\CustomerAsset;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CustomerAssetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerAssetsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds a call asset to a specific account.
 */
class AddCall
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Specifies the phone country code here or the default specified below will be used.
    // See supported codes at:
    // https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-17
    private const PHONE_COUNTRY = 'US';
    private const PHONE_NUMBER = 'INSERT_PHONE_NUMBER_HERE';
    // Optional: Specifies the conversion action ID to attribute call conversions to. If not set,
    // the default conversion action is used.
    private const CONVERSION_ACTION_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::PHONE_COUNTRY => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::PHONE_NUMBER => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::OPTIONAL_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::PHONE_COUNTRY] ?: self::PHONE_COUNTRY,
                $options[ArgumentNames::PHONE_NUMBER] ?: self::PHONE_NUMBER,
                $options[ArgumentNames::CONVERSION_ACTION_ID] ?: self::CONVERSION_ACTION_ID
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
     * @param int $customerId the client customer ID
     * @param string $phoneCountry the phone country (2-letter code)
     * @param string $phoneNumber the raw phone number, e.g. '(800) 555-0100'
     * @param int|null $conversionActionId the conversion action ID to attribute conversions to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $phoneCountry,
        string $phoneNumber,
        ?int $conversionActionId
    ) {
        // Creates the asset for the call assets.
        $assetResourceName = self::addCallAsset(
            $googleAdsClient,
            $customerId,
            $phoneCountry,
            $phoneNumber,
            $conversionActionId
        );

        // Adds the assets at the account level, so these will serve in all eligible campaigns.
        self::linkAssetToAccount($googleAdsClient, $customerId, $assetResourceName);
    }

    /**
     * Creates a new asset for the call.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $phoneCountry the phone country (2-letter code)
     * @param string $phoneNumber the raw phone number, e.g. '(800) 555-0100'
     * @param int|null $conversionActionId the conversion action ID to attribute conversions to
     * @return string the resource name of the created call asset
     */
    private static function addCallAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $phoneCountry,
        string $phoneNumber,
        ?int $conversionActionId
    ): string {
        // Creates the call asset.
        $callAsset = new CallAsset([
            // Sets the country code and phone number of the business to call.
            'country_code' => $phoneCountry,
            'phone_number' => $phoneNumber,
            // Optional: Specifies all day and time intervals for which the asset may serve.
            'ad_schedule_targets' => [new AdScheduleInfo([
                // Sets the day of this schedule as Monday.
                'day_of_week' => DayOfWeek::MONDAY,
                // Sets the start hour to 9am.
                'start_hour' => 9,
                // Sets the end hour to 5pm.
                'end_hour' => 17,
                // Sets the start and end minute of zero, for example: 9:00 and 5:00.
                'start_minute' => MinuteOfHour::ZERO,
                'end_minute' => MinuteOfHour::ZERO
            ])]
        ]);

        // Sets the conversion action ID to the one provided if any.
        if (!is_null($conversionActionId)) {
            $callAsset->setCallConversionAction(
                ResourceNames::forConversionAction($customerId, $conversionActionId)
            );
            $callAsset->setCallConversionReportingState(
                CallConversionReportingState::USE_RESOURCE_LEVEL_CALL_CONVERSION_ACTION
            );
        }

        // Creates an asset operation wrapping the call asset in an asset.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate(new Asset(['call_asset' => $callAsset]));

        // Issues a mutate request to add the asset and prints its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );
        $createdAssetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created a call asset with resource name: '%s'.%s",
            $createdAssetResourceName,
            PHP_EOL
        );

        return $createdAssetResourceName;
    }

    /**
     * Links the call asset at the account level to serve in all eligible campaigns.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $assetResourceName the resource name of the call asset
     */
    private static function linkAssetToAccount(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $assetResourceName
    ): void {
        // Creates a customer asset operation wrapping the call asset in a customer asset.
        $customerAssetOperation = new CustomerAssetOperation();
        $customerAssetOperation->setCreate(new CustomerAsset([
            'asset' => $assetResourceName,
            'field_type' => AssetFieldType::CALL
        ]));

        // Issues a mutate request to add the customer asset and prints its information.
        $customerAssetServiceClient = $googleAdsClient->getCustomerAssetServiceClient();
        $response = $customerAssetServiceClient->mutateCustomerAssets(
            MutateCustomerAssetsRequest::build($customerId, [$customerAssetOperation])
        );
        printf(
            "Created a customer asset with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

AddCall::main();

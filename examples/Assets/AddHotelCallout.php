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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Common\HotelCalloutAsset;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\CustomerAsset;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CustomerAssetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAssetResult;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerAssetResult;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerAssetsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds a hotel callout asset to a specific account.
 */
class AddHotelCallout
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    // See supported languages at:
    // https://developers.google.com/hotels/hotel-ads/api-reference/language-codes.
    private const LANGUAGE_CODE = 'INSERT_LANGUAGE_CODE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::LANGUAGE_CODE => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::LANGUAGE_CODE] ?: self::LANGUAGE_CODE
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
     * @param string $languageCode the language code
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $languageCode
    ) {
        // Creates assets for the hotel callout assets.
        $assetResourceNames =
            self::addHotelCalloutAsset($googleAdsClient, $customerId, $languageCode);

        // Adds the assets at the account level, so these will serve in all eligible campaigns.
        self::linkAssetsToAccount($googleAdsClient, $customerId, $assetResourceNames);
    }

    /**
     * Creates new assets for the callout.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $languageCode the language code for the callout text
     * @return string[] the resource names of created hotel callout assets
     */
    private static function addHotelCalloutAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $languageCode
    ): array {
        // Creates the hotel callouts with text and specified language.
        $hotelCalloutAssets = [
            new HotelCalloutAsset(['text' => 'Activities', 'language_code' => $languageCode]),
            new HotelCalloutAsset(['text' => 'Facilities', 'language_code' => $languageCode])
        ];

        // For each HotelCalloutAsset, wraps it in an Asset and creates an AssetOperation to add the
        // Asset.
        $assetOperations = array_map(function (HotelCalloutAsset $hotelCalloutAsset) {
            return new AssetOperation([
                'create' => new Asset(['hotel_callout_asset' => $hotelCalloutAsset])
            ]);
        }, $hotelCalloutAssets);

        // Issues a mutate request to add the assets and print its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, $assetOperations)
        );
        $createdAssetResourceNames = [];
        foreach ($response->getResults() as $result) {
            /** @var MutateAssetResult $result */
            printf(
                "Created a hotel callout asset with resource name: '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
            $createdAssetResourceNames[] = $result->getResourceName();
        }

        return $createdAssetResourceNames;
    }

    /**
     * Links the hotel callout assets at the account level to serve in all eligible campaigns.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string[] $assetResourceNames the resource names of the hotel callout assets
     */
    private static function linkAssetsToAccount(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $assetResourceNames
    ): void {
        // Creates a CustomerAssetOperation for each asset resource name by linking it to a newly
        // created CustomerAsset.
        $customerAssetOperations = array_map(function (string $assetResourceName) {
            return new CustomerAssetOperation(['create' => new CustomerAsset([
                'asset' => $assetResourceName,
                'field_type' => AssetFieldType::HOTEL_CALLOUT
            ])]);
        }, $assetResourceNames);

        // Issues a mutate request to add the customer assets and prints its information.
        $customerAssetServiceClient = $googleAdsClient->getCustomerAssetServiceClient();
        $response = $customerAssetServiceClient->mutateCustomerAssets(
            MutateCustomerAssetsRequest::build($customerId, $customerAssetOperations)
        );
        foreach ($response->getResults() as $result) {
            /** @var MutateCustomerAssetResult $result */
            printf(
                "Created a customer asset with resource name: '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }
}

AddHotelCallout::main();

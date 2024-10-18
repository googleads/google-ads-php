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
use Google\Ads\GoogleAds\V18\Common\Money;
use Google\Ads\GoogleAds\V18\Common\PriceAsset;
use Google\Ads\GoogleAds\V18\Common\PriceOffering;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Enums\PriceExtensionPriceQualifierEnum\PriceExtensionPriceQualifier;
use Google\Ads\GoogleAds\V18\Enums\PriceExtensionPriceUnitEnum\PriceExtensionPriceUnit;
use Google\Ads\GoogleAds\V18\Enums\PriceExtensionTypeEnum\PriceExtensionType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\CustomerAsset;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CustomerAssetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerAssetsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds a price asset and associates it with an account.
 */
class AddPrices
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a PriceAsset.
        $priceAssetResourceName = self::createPriceAsset($googleAdsClient, $customerId);
        // Links the asset at the Customer level, allowing the asset to serve in all
        // eligible campaigns. For more detail about linking assets at customer, campaign and
        // ad group level see
        // https://support.google.com/google-ads/answer/7106946?hl=en&ref_topic=3119125
        self::linkPriceAssetToCustomer($googleAdsClient, $priceAssetResourceName, $customerId);
    }

    /**
     * Creates a PriceAsset.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @return string the created PriceAsset's resource name
     */
    private static function createPriceAsset(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $priceAsset = new PriceAsset([
            'type' => PriceExtensionType::SERVICES,
            // Optional: Sets price qualifier.
            'price_qualifier' => PriceExtensionPriceQualifier::FROM,
            'language_code' => 'en'
        ]);

        // To create a price asset, at least three price offerings are needed.
        $priceAsset->setPriceOfferings([
            self::createPriceOffering(
                'Scrubs',
                'Body Scrub, Salt Scrub',
                60000000, // 60 USD
                'USD',
                PriceExtensionPriceUnit::PER_HOUR,
                'http://www.example.com/scrubs',
                'http://m.example.com/scrubs'
            ),
            self::createPriceOffering(
                'Hair Cuts',
                'Once a month',
                75000000, // 75 USD
                'USD',
                PriceExtensionPriceUnit::PER_MONTH,
                'http://www.example.com/haircuts',
                'http://m.example.com/haircuts'
            ),
            self::createPriceOffering(
                'Skin Care Package',
                'Four times a month',
                250000000, // 250 USD
                'USD',
                PriceExtensionPriceUnit::PER_MONTH,
                'http://www.example.com/skincarepackage'
            )
        ]);

        // Wraps the PriceAsset in an Asset.
        $asset = new Asset([
            'price_asset' => $priceAsset,
            'tracking_url_template' => 'http://tracker.example.com/?u={lpurl}'
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset and print its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );
        $assetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created price asset with resource name: '%s'.%s",
            $assetResourceName,
            PHP_EOL
        );

        return $assetResourceName;
    }

    /**
     * Links an asset to customer, allowing it to serve in all campaigns under the customer.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $priceAssetResourceName the price asset's resource name to link
     * @param int $customerId the customer ID to link the price asset to
     */
    private static function linkPriceAssetToCustomer(
        GoogleAdsClient $googleAdsClient,
        string $priceAssetResourceName,
        int $customerId
    ) {
        // Creates the CustomerAsset.
        $customerAsset = new CustomerAsset([
            'asset' => $priceAssetResourceName,
            'field_type' => AssetFieldType::PRICE
        ]);

        // Creates a customer asset operation.
        $customerAssetOperation = new CustomerAssetOperation();
        $customerAssetOperation->setCreate($customerAsset);

        // Issues a mutate request to add the customer asset and print its information.
        $customerAssetServiceClient = $googleAdsClient->getCustomerAssetServiceClient();
        $response = $customerAssetServiceClient->mutateCustomerAssets(
            MutateCustomerAssetsRequest::build($customerId, [$customerAssetOperation])
        );
        printf(
            "Created customer asset with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Creates a price offering with the specified parameters.
     *
     * @param string $header the header
     * @param string $description the description
     * @param int $priceInMicros the price in micros
     * @param string $currencyCode the currency code
     * @param int $unit the enum value of unit
     * @param string $finalUrl the final URL
     * @param null|string $finalMobileUrl the final mobile URL
     * @return PriceOffering the created price offering
     */
    private static function createPriceOffering(
        string $header,
        string $description,
        int $priceInMicros,
        string $currencyCode,
        int $unit,
        string $finalUrl,
        string $finalMobileUrl = null
    ) {
        $priceOffering = new PriceOffering([
            'header' => $header,
            'description' => $description,
            'final_url' => $finalUrl,
            'price' => new Money([
                'amount_micros' => $priceInMicros,
                'currency_code' => $currencyCode
            ]),
            'unit' => $unit
        ]);

        if (!is_null($finalMobileUrl)) {
            $priceOffering->setFinalMobileUrl($finalMobileUrl);
        }

        return $priceOffering;
    }
}

AddPrices::main();

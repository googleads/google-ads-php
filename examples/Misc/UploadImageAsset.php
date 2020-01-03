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

namespace Google\Ads\GoogleAds\Examples\Misc;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Common\ImageAsset;
use Google\Ads\GoogleAds\V2\Common\ImageDimension;
use Google\Ads\GoogleAds\V2\Enums\AssetTypeEnum\AssetType;
use Google\Ads\GoogleAds\V2\Enums\MimeTypeEnum\MimeType;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\Asset;
use Google\Ads\GoogleAds\V2\Services\AssetOperation;
use Google\Ads\GoogleAds\V2\Services\MutateAssetResult;
use Google\ApiCore\ApiException;
use Google\Protobuf\BytesValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/** This example uploads an image asset. To get image assets, run GetAllImageAssets.php. */
class UploadImageAsset
{
    const CUSTOMER_ID = '7556834180';
    const IMAGE_URL = 'https://goo.gl/3b9Wfh';

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
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates an image content.
        $imageContent = file_get_contents(self::IMAGE_URL);

        // Creates an image asset.
        $imageAsset = new ImageAsset([
            'data' => new BytesValue(['value' => $imageContent]),
            'file_size' => new Int64Value(['value' => strlen($imageContent)]),
            'mime_type' => MimeType::IMAGE_JPEG,
            'full_size' => new ImageDimension([
                'height_pixels' => new Int64Value(['value' => 315]),
                'width_pixels' => new Int64Value(['value' => 600]),
                'url' => new StringValue(['value' => self::IMAGE_URL]),
            ])
        ]);

        // Creates an asset.
        $asset = new Asset([
            // Optional: Provide a unique friendly name to identify your asset.
            // If you specify the name field, then both the asset name and the image being
            // uploaded should be unique, and should not match another ACTIVE asset in this
            // customer account.
            // 'name' => new StringValue(['value' => 'Jupiter Trip #' . uniqid()]),
            'type' => AssetType::IMAGE,
            'image_asset' => $imageAsset
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            $customerId,
            [$assetOperation]
        );

        if (!empty($response->getResults())) {
            // Prints the resource name of the added image asset.
            /** @var MutateAssetResult $addedImageAsset */
            $addedImageAsset = $response->getResults()[0];
            printf(
                "Image asset with resource name: '%s' is created.%s",
                $addedImageAsset->getResourceName(),
                PHP_EOL
            );
        } else {
            print 'No image asset was created.' . PHP_EOL;
        }
    }
}

UploadImageAsset::main();

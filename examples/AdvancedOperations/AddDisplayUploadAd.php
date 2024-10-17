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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdMediaBundleAsset;
use Google\Ads\GoogleAds\V18\Common\DisplayUploadAdInfo;
use Google\Ads\GoogleAds\V18\Common\MediaBundleAsset;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\AssetTypeEnum\AssetType;
use Google\Ads\GoogleAds\V18\Enums\DisplayUploadProductTypeEnum\DisplayUploadProductType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\ApiCore\ApiException;

/**
 * This code example adds a display upload ad to a given ad group.
 * To get ad groups, run GetAdGroups.php.
 */
class AddDisplayUploadAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $adGroupId the ad group ID to add a display upload ad to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // There are several types of display upload ads. For this example, we will create
        // an HTML5 upload ad, which requires a media bundle.
        // The DisplayUploadProductType field lists the available display upload types:
        // https://developers.google.com/google-ads/api/reference/rpc/latest/DisplayUploadAdInfo
        // Creates a new media bundle asset and returns the resource name.
        $adAssetResourceName = self::createMediaBundleAsset($googleAdsClient, $customerId);

        // Creates a new display upload ad and associates it with the specified ad group.
        self::createDisplayUploadAdGroupAd(
            $googleAdsClient,
            $customerId,
            $adGroupId,
            $adAssetResourceName
        );
    }

    /**
     * Creates a media bundle from the assets in a zip file. The zip file contains the HTML5
     * components.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly uploaded media bundle asset
     */
    private static function createMediaBundleAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // The HTML5 zip file contains all the HTML, CSS, and images needed for the
        // HTML5 ad. For help on creating an HTML5 zip file, check out Google Web
        // Designer (https://www.google.com/webdesigner/).
        $html5Zip = file_get_contents('https://gaagl.page.link/ib87');

        // Creates the media bundle asset.
        $asset = new Asset([
            'name' => 'Ad Media Bundle',
            'type' => AssetType::MEDIA_BUNDLE,
            'media_bundle_asset' => new MediaBundleAsset(['data' => $html5Zip])
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );

        // Prints the resource name of the added media bundle asset.
        $addedMediaBundleAssetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Uploaded media bundle asset with resource name: '%s'.%s",
            $addedMediaBundleAssetResourceName,
            PHP_EOL
        );

        return $addedMediaBundleAssetResourceName;
    }

    /**
     * Creates a new HTML5 display upload ad and adds it to the specified ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID where the new ad will be added to
     * @param string $adAssetResourceName the resource name of the media bundle containing the
     *     HTML5 components
     */
    private static function createDisplayUploadAdGroupAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $adAssetResourceName
    ) {
        // Creates an ad group ad for the new ad.
        $adGroupAd = new AdGroupAd([
            'ad' => new Ad([
                'name' => 'Ad for HTML5',
                'final_urls' => ['http://example.com/html5'],
                // Exactly one ad data field must be included to specify the ad type. See
                // https://developers.google.com/google-ads/api/reference/rpc/latest/Ad for the full
                // list of available types.
                'display_upload_ad' => new DisplayUploadAdInfo([
                    'display_upload_product_type' => DisplayUploadProductType::HTML5_UPLOAD_AD,
                    'media_bundle' => new AdMediaBundleAsset(['asset' => $adAssetResourceName])
                ])
            ]),
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'status' => AdGroupAdStatus::PAUSED
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        /** @var MutateAdGroupAdsResponse $adGroupAdResponse */
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        // Prints information about the newly created ad group ad.
        $adGroupAdResourceName = $adGroupAdResponse->getResults()[0]->getResourceName();
        printf("Created ad group ad with resource name: '%s'.%s", $adGroupAdResourceName, PHP_EOL);
    }
}

AddDisplayUploadAd::main();

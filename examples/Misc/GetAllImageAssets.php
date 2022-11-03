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

namespace Google\Ads\GoogleAds\Examples\Misc;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** This example gets all image assets. */
class GetAllImageAssets
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const PAGE_SIZE = 1000;

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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that will retrieve all image assets.
        $query = "SELECT asset.name, " .
            "asset.image_asset.file_size, " .
            "asset.image_asset.full_size.width_pixels, " .
            "asset.image_asset.full_size.height_pixels, " .
            "asset.image_asset.full_size.url " .
            "FROM asset WHERE asset.type = 'IMAGE'";
        // Issues a search request by specifying page size.
        $response = $googleAdsServiceClient->search(
            $customerId,
            $query,
            ['pageSize' => self::PAGE_SIZE, 'returnTotalResultsCount' => true]
        );

        // Iterates over all rows in all pages and prints the requested field values for the image
        // asset in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                "Image with name '%s', file size %d bytes, width %dpx, height %dpx, " .
                    "and URL '%s' was found.%s",
                $googleAdsRow->getAsset()->getName(),
                $googleAdsRow->getAsset()->getImageAsset()->getFileSize(),
                $googleAdsRow
                    ->getAsset()->getImageAsset()->getFullSize()->getWidthPixels(),
                $googleAdsRow
                    ->getAsset()->getImageAsset()->getFullSize()->getHeightPixels(),
                $googleAdsRow->getAsset()->getImageAsset()->getFullSize()->getUrl(),
                PHP_EOL
            );
        }
        printf(
            "Number of images found: %d.%s",
            $response->getPage()->getResponseObject()->getTotalResultsCount(),
            PHP_EOL
        );
    }
}

GetAllImageAssets::main();

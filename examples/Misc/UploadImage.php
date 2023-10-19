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
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V14\Enums\MediaTypeEnum\MediaType;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\MediaFile;
use Google\Ads\GoogleAds\V14\Resources\MediaImage;
use Google\Ads\GoogleAds\V14\Services\MediaFileOperation;
use Google\Ads\GoogleAds\V14\Services\MutateMediaFilesRequest;
use Google\ApiCore\ApiException;

/**
 * This code example uploads an image.
 *
 * This code example uses version v14 of the Google Ads API. Google Ads is migrating
 * from individual media files to assets, and version v15 of the API removed support for
 * MediaFileService as part of this migration. Once your Ads account is migrated, this code
 * example will stop working, and you should use UploadImageAsset.php instead. This code
 * example will be removed once the migration completes. See
 * https://ads-developers.googleblog.com/2023/07/image-and-location-auto-migration.html for
 * more details.
 */
class UploadImage
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const IMAGE_URL = 'https://gaagl.page.link/Eit5';

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
            // We set this value to true to show how to use GAPIC v2 source code. You can remove the
            // below line if you wish to use the old-style source code. Note that in that case, you
            // probably need to modify some parts of the code below to make it work.
            // For more information, see
            // https://developers.devsite.corp.google.com/google-ads/api/docs/client-libs/php/gapic.
            ->usingGapicV2Source(true)
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
        // Creates an image content.
        $imageContent = file_get_contents(self::IMAGE_URL);

        // Creates a media file.
        $mediaFile = new MediaFile([
            'name' => 'Ad Image',
            'type' => MediaType::IMAGE,
            'source_url' => self::IMAGE_URL,
            'image' => new MediaImage(['data' => $imageContent])
        ]);

        // Creates a media file operation.
        $mediaFileOperation = new MediaFileOperation();
        $mediaFileOperation->setCreate($mediaFile);

        // Issues a mutate request to add the media file.
        $mediaFileServiceClient = $googleAdsClient->getMediaFileServiceClient();
        $response = $mediaFileServiceClient->mutateMediaFiles(MutateMediaFilesRequest::build(
            $customerId,
            [$mediaFileOperation]
        ));

        printf("Added %d images:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedMediaFile) {
            /** @var MediaFile $addedMediaFile */
            printf(
                "New image added with resource name: '%s'%s",
                $addedMediaFile->getResourceName(),
                PHP_EOL
            );
        }
    }
}

UploadImage::main();

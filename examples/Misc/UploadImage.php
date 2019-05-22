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
use Google\Ads\GoogleAds\Lib\V1\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V1\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V1\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V1\Enums\MediaTypeEnum\MediaType;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V1\Resources\MediaFile;
use Google\Ads\GoogleAds\V1\Resources\MediaImage;
use Google\Ads\GoogleAds\V1\Services\MediaFileOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\StringValue;

/** This example uploads an image. */
class UploadImage
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
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
     * @param int $customerId the client customer ID without hyphens
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, $customerId)
    {
        // Creates an image content.
        $imageContent = file_get_contents(self::IMAGE_URL);

        // Creates a media file.
        $mediaFile = new MediaFile([
            'name' => new StringValue(['value' => 'Ad Image']),
            'type' => MediaType::IMAGE,
            'source_url' => new StringValue(['value' => self::IMAGE_URL]),
            'image' => new MediaImage(['data' => $imageContent])
        ]);

        // Creates a media file operation.
        $mediaFileOperation = new MediaFileOperation();
        $mediaFileOperation->setCreate($mediaFile);

        // Issues a mutate request to add the media file.
        $mediaFileServiceClient = $googleAdsClient->getMediaFileServiceClient();
        $response = $mediaFileServiceClient->mutateMediaFiles(
            $customerId,
            [$mediaFileOperation]
        );

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

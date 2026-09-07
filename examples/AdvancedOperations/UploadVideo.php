<?php

/**
 * Copyright 2026 Google LLC
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
use Google\Ads\GoogleAds\Lib\V25\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V25\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V25\GoogleAdsException;
use Google\Ads\GoogleAds\V25\Enums\YouTubeVideoPrivacyEnum\YouTubeVideoPrivacy;
use Google\Ads\GoogleAds\V25\Enums\YouTubeVideoUploadStateEnum\YouTubeVideoUploadState;
use Google\Ads\GoogleAds\V25\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V25\Resources\YouTubeVideoUpload;
use Google\Ads\GoogleAds\V25\Services\CreateYouTubeVideoUploadRequest;
use Google\Ads\GoogleAds\V25\Services\CreateYouTubeVideoUploadResponse;
use Google\Ads\GoogleAds\V25\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V25\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\ResumableUpload\ResumableUpload;
use GuzzleHttp\Psr7\Utils;

/**
 * This example illustrates how to upload videos to YouTube.
 */
class UploadVideo
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const VIDEO_FILE_PATH = 'INSERT_VIDEO_FILE_PATH_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::VIDEO_FILE_PATH => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::VIDEO_FILE_PATH] ?: self::VIDEO_FILE_PATH
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
     * @param string $videoFilePath the path to a video file to upload to YouTube
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $videoFilePath
    ) {
        // [START upload_video_1]
        $youTubeVideoUploadServiceClient = $googleAdsClient->getYouTubeVideoUploadServiceClient();

        $youTubeVideoUpload = new YouTubeVideoUpload([
            'video_title' => 'Test Video',
            'video_description' => 'Test Video Description',
            'video_privacy' => YouTubeVideoPrivacy::UNLISTED
        ]);

        $createYouTubeVideoUploadRequest = CreateYouTubeVideoUploadRequest::build(
            $customerId,
            $youTubeVideoUpload
        );

        /** @var ResumableUpload $resumableUpload */
        $resumableUpload = $youTubeVideoUploadServiceClient->createYouTubeVideoUpload(
            $createYouTubeVideoUploadRequest
        );

        $stream = Utils::streamFor(fopen($videoFilePath, 'rb'));
        /** @var CreateYouTubeVideoUploadResponse $response */
        $response = $resumableUpload->startUpload($stream);

        $videoUploadResourceName = $response->getResourceName();
        printf("Created YouTube video upload: '%s'%s", $videoUploadResourceName, PHP_EOL);
        // [END upload_video_1]

        // [START upload_video_3]
        // Retrieve the metadata of the newly uploaded video.
        $query = sprintf(
            "SELECT you_tube_video_upload.resource_name, "
            . "you_tube_video_upload.video_id, "
            . "you_tube_video_upload.state "
            . "FROM you_tube_video_upload "
            . "WHERE you_tube_video_upload.resource_name = '%s'",
            $videoUploadResourceName
        );

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );

        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                "Video with ID '%s' was found in state '%s'.%s",
                $googleAdsRow->getYouTubeVideoUpload()->getVideoId(),
                YouTubeVideoUploadState::name($googleAdsRow->getYouTubeVideoUpload()->getState()),
                PHP_EOL
            );
        }
        // [END upload_video_3]
    }
}

UploadVideo::main();

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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\GmailAdInfo;
use Google\Ads\GoogleAds\V8\Common\GmailTeaser;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Enums\MediaTypeEnum\MediaType;
use Google\Ads\GoogleAds\V8\Enums\MimeTypeEnum\MimeType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\MediaFile;
use Google\Ads\GoogleAds\V8\Resources\MediaImage;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\MediaFileOperation;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to add a Gmail ad to a given ad group. The ad group's campaign
 * needs to have an AdvertisingChannelType of DISPLAY and AdvertisingChannelSubType of
 * DISPLAY_GMAIL_AD.
 */
class AddGmailAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    private const LOGO_IMAGE_URL = 'https://goo.gl/mtt54n';
    private const MARKETING_IMAGE_URL = 'https://goo.gl/3b9Wfh';

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
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
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
     * @param int $adGroupId the ad group ID to add an ad to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $mediaFiles = self::addMediaFiles($googleAdsClient, $customerId);
        self::addGmailAd($googleAdsClient, $customerId, $adGroupId, $mediaFiles);
    }

    /**
     * Adds the media files by using the class constants.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return array the media file resource names
     */
    private static function addMediaFiles(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates the logo image data.
        $logoImageData = file_get_contents(self::LOGO_IMAGE_URL);

        // Creates the logo image.
        $logoMediaFile = new MediaFile([
            'type' => MediaType::IMAGE,
            'image' => new MediaImage(['data' => $logoImageData]),
            'mime_type' => MimeType::IMAGE_PNG
        ]);

        // Creates the operation for the logo image.
        $logoMediaFileOperation = new MediaFileOperation();
        $logoMediaFileOperation->setCreate($logoMediaFile);

        // Creates the marketing image data.
        $marketingImageData = file_get_contents(self::MARKETING_IMAGE_URL);

        // Creates the marketing image.
        $marketingMediaFile = new MediaFile([
            'type' => MediaType::IMAGE,
            'image' => new MediaImage(['data' => $marketingImageData]),
            'mime_type' => MimeType::IMAGE_JPEG
        ]);

        // Creates the operation for the marketing image.
        $marketingMediaFileOperation = new MediaFileOperation();
        $marketingMediaFileOperation->setCreate($marketingMediaFile);

        // Issues a mutate request to add the media files.
        $mediaFileServiceClient = $googleAdsClient->getMediaFileServiceClient();
        $response = $mediaFileServiceClient->mutateMediaFiles(
            $customerId,
            [$logoMediaFileOperation, $marketingMediaFileOperation]
        );

        foreach ($response->getResults() as $addedMediaFile) {
            /** @var MediaFile $addedMediaFile */
            printf(
                "Created media file with resource name '%s'.%s",
                $addedMediaFile->getResourceName(),
                PHP_EOL
            );
        }

        // Returns the created media file resource names.
        return [
            'logoResourceName' => $response->getResults()[0]->getResourceName(),
            'marketingImageResourceName' => $response->getResults()[1]->getResourceName()
        ];
    }

    /**
     * Adds the Gmail ad.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param array $mediaFiles the media file resource names
     */
    private static function addGmailAd(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        array $mediaFiles
    ) {
        // Creates the Gmail ad info.
        $gmailAdInfo = new GmailAdInfo([
            // Sets the teaser information.
            'teaser' => new GmailTeaser([
                'headline' => 'Dream',
                'description' => 'Create your own adventure',
                'business_name' => 'Interplanetary Ships',
                'logo_image' => $mediaFiles['logoResourceName']
            ]),
            // Sets the marketing image and other information.
            'marketing_image' => $mediaFiles['marketingImageResourceName'],
            'marketing_image_headline' => 'Travel',
            'marketing_image_description' => 'Take to the skies!'
        ]);

        // Sets the Gmail ad info on an Ad.
        $ad = new Ad([
            'name' => 'Gmail Ad #' . Helper::getPrintableDatetime(),
            'final_urls' => ['http://www.example.com'],
            'gmail_ad' => $gmailAdInfo
        ]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad' => $ad,
            'status' => AdGroupAdStatus::PAUSED,
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$adGroupAdOperation]);

        // Prints the resource name of the added ad group ad.
        $addedAdGroupAd = $response->getResults()[0];
        printf(
            "Created ad group ad with resource name '%s'.%s",
            $addedAdGroupAd->getResourceName(),
            PHP_EOL
        );
    }
}

AddGmailAd::main();

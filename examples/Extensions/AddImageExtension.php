<?php

/**
 * Copyright 2021 Google LLC
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
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V14\ResourceNames;
use Google\Ads\GoogleAds\V14\Common\ImageFeedItem;
use Google\Ads\GoogleAds\V14\Enums\ExtensionTypeEnum\ExtensionType;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\CampaignExtensionSetting;
use Google\Ads\GoogleAds\V14\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V14\Services\CampaignExtensionSettingOperation;
use Google\Ads\GoogleAds\V14\Services\ExtensionFeedItemOperation;
use Google\ApiCore\ApiException;

/**
 * Adds an image extension to a campaign. To create a campaign, run
 * BasicOperations/AddCampaigns.php. To create an image asset, run Misc/UploadImageAsset.php.
 */
class AddImageExtension
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const IMAGE_ASSET_ID = 'INSERT_IMAGE_ASSET_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::IMAGE_ASSET_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID,
                $options[ArgumentNames::IMAGE_ASSET_ID] ?: self::IMAGE_ASSET_ID
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
     * @param int $campaignId the campaign ID
     * @param int $imageAssetId the image asset ID used to create an image extension
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        int $imageAssetId
    ) {
        // Creates an extension feed item using the specified image asset ID.
        $extensionFeedItem = new ExtensionFeedItem([
            'image_feed_item' => new ImageFeedItem([
                'image_asset' => ResourceNames::forAsset($customerId, $imageAssetId)
            ])
        ]);

        // Creates an extension feed item operation.
        $extensionFeedItemOperation = new ExtensionFeedItemOperation();
        $extensionFeedItemOperation->setCreate($extensionFeedItem);

        // Issues a mutate request to add the extension feed item and prints its information.
        $extensionFeedItemServiceClient = $googleAdsClient->getExtensionFeedItemServiceClient();
        $response = $extensionFeedItemServiceClient->mutateExtensionFeedItems(
            $customerId,
            [$extensionFeedItemOperation]
        );
        $extensionFeedItemResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created an image extension with resource name: '%s'.%s",
            $extensionFeedItemResourceName,
            PHP_EOL
        );

        // Then, creates a campaign extension setting using the created image feed item.
        $campaignExtensionSetting = new CampaignExtensionSetting([
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
            'extension_type' => ExtensionType::IMAGE,
            'extension_feed_items' => [$extensionFeedItemResourceName]
        ]);

        // Creates a campaign extension setting operation.
        $campaignExtensionSettingOperation = new CampaignExtensionSettingOperation();
        $campaignExtensionSettingOperation->setCreate($campaignExtensionSetting);

        // Issues a mutate request to add the campaign extension setting and prints its information.
        $campaignExtensionSettingServiceClient =
            $googleAdsClient->getCampaignExtensionSettingServiceClient();
        $response = $campaignExtensionSettingServiceClient->mutateCampaignExtensionSettings(
            $customerId,
            [$campaignExtensionSettingOperation]
        );
        printf(
            "Created a campaign extension setting with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

AddImageExtension::main();

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
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V3\ResourceNames;
use Google\Ads\GoogleAds\V3\Enums\ExtensionTypeEnum\ExtensionType;
use Google\Ads\GoogleAds\V3\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V3\Resources\CampaignExtensionSetting;
use Google\Ads\GoogleAds\V3\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V3\Services\CampaignExtensionSettingOperation;
use Google\Ads\GoogleAds\V3\Services\ExtensionFeedItemOperation;
use Google\Ads\GoogleAds\V3\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V3\Services\SearchGoogleAdsStreamResponse;
use Google\ApiCore\ApiException;
use Google\Protobuf\StringValue;

/**
 * Removes the entire campaign extension setting by removing both the specified campaign extension
 * setting itself and its associated extension feed items. This requires two steps, since removing
 * the campaign extension setting doesn't automatically remove its extension feed items.
 */
class RemoveEntireSitelinkCampaignExtensionSetting
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID
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
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $extensionFeedItemResourceNames =
            self::getAllSitelinkExtensionFeedItems($googleAdsClient, $customerId, $campaignId);

        // 1) Removes the campaign extension setting.

        // Creates the resource name of a campaign extension setting to remove.
        $campaignExtensionSettingResourceName = ResourceNames::forCampaignExtensionSetting(
            $customerId,
            $campaignId,
            ExtensionType::SITELINK
        );

        // Creates a campaign extension setting operation.
        $extensionFeedItemOperation = new CampaignExtensionSettingOperation();
        $extensionFeedItemOperation->setRemove($campaignExtensionSettingResourceName);

        // Issues a mutate request to remove the campaign extension setting.
        $extensionFeedItemServiceClient =
            $googleAdsClient->getCampaignExtensionSettingServiceClient();
        $response = $extensionFeedItemServiceClient->mutateCampaignExtensionSettings(
            $customerId,
            [$extensionFeedItemOperation]
        );

        // Prints the resource name of the removed campaign extension setting.
        /** @var CampaignExtensionSetting $removedCampaignExtensionSetting */
        $removedCampaignExtensionSetting = $response->getResults()[0];
        printf(
            "Removed a campaign extension setting with resource name: '%s'.%s",
            $removedCampaignExtensionSetting->getResourceName(),
            PHP_EOL
        );

        // 2) Removes all the extension feed items of the previously removed campaign extension
        // setting.

        foreach ($extensionFeedItemResourceNames as $extensionFeedItemResourceName) {
            // Creates an operation to remove the extension feed item.
            $extensionFeedItemOperation = new ExtensionFeedItemOperation();
            $extensionFeedItemOperation->setRemove($extensionFeedItemResourceName);

            // Issues a mutate request to remove the extension feed item.
            $extensionFeedItemServiceClient =
                $googleAdsClient->getExtensionFeedItemServiceClient();
            $response = $extensionFeedItemServiceClient->mutateExtensionFeedItems(
                $customerId,
                [$extensionFeedItemOperation]
            );

            // Prints the resource name of the removed extension feed item.
            /** @var ExtensionFeedItem $removedExtensionFeedItem */
            $removedExtensionFeedItem = $response->getResults()[0];
            printf(
                "Removed an extension feed item with resource name: '%s'.%s",
                $removedExtensionFeedItem->getResourceName(),
                PHP_EOL
            );
        }
    }

    /**
     * Returns all sitelink extension feed items associated the specified campaign extension
     * setting.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID to get its all sitelink extension feed items
     * @return string[] the array of resource names of extension feed items
     */
    private static function getAllSitelinkExtensionFeedItems(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ): array {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all campaigns.
        $query = sprintf(
            "SELECT campaign_extension_setting.campaign,"
            . " campaign_extension_setting.extension_type,"
            . " campaign_extension_setting.extension_feed_items"
            . " FROM campaign_extension_setting"
            . " WHERE campaign_extension_setting.campaign = '%s'"
            . " AND campaign_extension_setting.extension_type = %s",
            ResourceNames::forCampaign($customerId, $campaignId),
            ExtensionType::name(ExtensionType::SITELINK)
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream =
            $googleAdsServiceClient->searchStream($customerId, $query);

        print 'Found the following extension feed items of the sitelink campaign extension setting:'
            . PHP_EOL;
        $extensionFeedItemResourceNames = [];
        // Iterates over all rows in all messages and prints the requested field values for
        // the campaign extension setting in each row.
        foreach ($stream->readAll() as $response) {
            /** @var SearchGoogleAdsStreamResponse $response */
            foreach ($response->getResults() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                $extensionFeedItems =
                    $googleAdsRow->getCampaignExtensionSetting()->getExtensionFeedItems();
                foreach ($extensionFeedItems as $extensionFeedItem) {
                    /** @var StringValue $extensionFeedItem */
                    $extensionFeedItemResourceName = $extensionFeedItem->getValue();
                    $extensionFeedItemResourceNames[] = $extensionFeedItemResourceName;
                    printf(
                        "Extension feed item with resource name '%s' was found.%s",
                        $extensionFeedItemResourceName,
                        PHP_EOL
                    );
                }
            }
        }
        return $extensionFeedItemResourceNames;
    }
}

RemoveEntireSitelinkCampaignExtensionSetting::main();

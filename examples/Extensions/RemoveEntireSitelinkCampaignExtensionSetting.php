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
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V15\ResourceNames;
use Google\Ads\GoogleAds\V15\Enums\ExtensionTypeEnum\ExtensionType;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Services\CampaignExtensionSettingOperation;
use Google\Ads\GoogleAds\V15\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V15\Services\ExtensionFeedItemOperation;
use Google\Ads\GoogleAds\V15\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V15\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateOperation;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * Removes the entire sitelink campaign extension setting by removing both the sitelink campaign
 * extension setting itself and its associated sitelink extension feed items. This requires two
 * steps, since removing the campaign extension setting doesn't automatically remove its extension
 * feed items.
 *
 * To make this example work with other types of extensions, find `ExtensionType::SITELINK` and
 * replace it with the extension type you wish to remove.
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
     * @param int $campaignId the campaign ID
     */
    // [START remove_entire_sitelink_campaign_extension_setting]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $mutateOperations = [];
        // Creates a mutate operation that contains the campaign extension setting operation
        // to remove the specified sitelink campaign extension setting.
        $mutateOperations[] =
            self::createSitelinkCampaignExtensionSettingMutateOperation($customerId, $campaignId);

        // Gets all sitelink extension feed items of the specified campaign.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $extensionFeedItemResourceNames = self::getAllSitelinkExtensionFeedItems(
            $googleAdsServiceClient,
            $customerId,
            $campaignId
        );

        // Creates mutate operations, each of which contains an extension feed item operation
        // to remove the specified extension feed items.
        $mutateOperations = array_merge(
            $mutateOperations,
            self::createExtensionFeedItemMutateOperations($extensionFeedItemResourceNames)
        );

        // Issues a mutate request to remove the campaign extension setting and its extension
        // feed items.
        $response = $googleAdsServiceClient->mutate(
            MutateGoogleAdsRequest::build($customerId, $mutateOperations)
        );
        $mutateOperationResponses = $response->getMutateOperationResponses();

        // Prints the information on the removed campaign extension setting and its extension feed
        // items.
        // Each mutate operation response is returned in the same order as we passed its
        // corresponding operation. Therefore, the first belongs to the campaign setting operation,
        // and the rest belong to the extension feed item operations.
        printf(
            "Removed a campaign extension setting with resource name: '%s'.%s",
            $mutateOperationResponses[0]->getCampaignExtensionSettingResult()->getResourceName(),
            PHP_EOL
        );
        for ($i = 1; $i < count($mutateOperationResponses); $i++) {
            printf(
                "Removed an extension feed item with resource name: '%s'.%s",
                $mutateOperationResponses[$i]->getExtensionFeedItemResult()->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END remove_entire_sitelink_campaign_extension_setting]

    /**
     * Creates a mutate operation for the sitelink campaign extension setting that will be removed.
     *
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     * @return MutateOperation the created mutate operation for the sitelink campaign extension
     *     setting
     */
    private static function createSitelinkCampaignExtensionSettingMutateOperation(
        int $customerId,
        int $campaignId
    ): MutateOperation {
        // Creates the resource name of a campaign extension setting to remove.
        $campaignExtensionSettingResourceName = ResourceNames::forCampaignExtensionSetting(
            $customerId,
            $campaignId,
            ExtensionType::name(ExtensionType::SITELINK)
        );

        // Creates a campaign extension setting operation.
        $campaignExtensionSettingOperation = new CampaignExtensionSettingOperation();
        $campaignExtensionSettingOperation->setRemove($campaignExtensionSettingResourceName);

        // Creates a mutate operation for the campaign extension setting operation.
        return new MutateOperation([
            'campaign_extension_setting_operation' => $campaignExtensionSettingOperation]);
    }

    /**
     * Returns all sitelink extension feed items associated to the specified campaign extension
     * setting.
     *
     * @param GoogleAdsServiceClient $googleAdsServiceClient the Google Ads API service client
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID to get the sitelink extension feed items from
     * @return string[] the array of resource names of extension feed items
     */
    // [START remove_entire_sitelink_campaign_extension_setting_1]
    private static function getAllSitelinkExtensionFeedItems(
        GoogleAdsServiceClient $googleAdsServiceClient,
        int $customerId,
        int $campaignId
    ): array {
        // Creates a query that retrieves all campaigns.
        $query = sprintf(
            "SELECT campaign_extension_setting.campaign, "
            . "campaign_extension_setting.extension_type, "
            . "campaign_extension_setting.extension_feed_items "
            . "FROM campaign_extension_setting "
            . "WHERE campaign_extension_setting.campaign = '%s' "
            . "AND campaign_extension_setting.extension_type = %s",
            ResourceNames::forCampaign($customerId, $campaignId),
            ExtensionType::name(ExtensionType::SITELINK)
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );

        $extensionFeedItemResourceNames = [];
        // Iterates over all rows in all messages and prints the requested field values for
        // the campaign extension setting in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $extensionFeedItems =
                $googleAdsRow->getCampaignExtensionSetting()->getExtensionFeedItems();
            foreach ($extensionFeedItems as $extensionFeedItem) {
                /** @var string $extensionFeedItem */
                $extensionFeedItemResourceNames[] = $extensionFeedItem;
                printf(
                    "Extension feed item with resource name '%s' was found.%s",
                    $extensionFeedItem,
                    PHP_EOL
                );
            }
        }
        if (empty($extensionFeedItemResourceNames)) {
            throw new \InvalidArgumentException(
                'The specified campaign does not contain a sitelink campaign extension setting.'
            );
        }
        return $extensionFeedItemResourceNames;
    }
    // [END remove_entire_sitelink_campaign_extension_setting_1]

    /**
     * Creates mutate operations for the sitelink extension feed items that will be removed.
     *
     * @param string[] $extensionFeedItemResourceNames the extension feed item resource names
     * @return MutateOperation[] the array of created mutate operations for the extension feed items
     */
    private static function createExtensionFeedItemMutateOperations(
        array $extensionFeedItemResourceNames
    ): array {
        $mutateOperations = [];
        foreach ($extensionFeedItemResourceNames as $extensionFeedItemResourceName) {
            // Creates an operation to remove the extension feed item.
            $extensionFeedItemOperation = new ExtensionFeedItemOperation();
            $extensionFeedItemOperation->setRemove($extensionFeedItemResourceName);

            // Creates a mutate operation for each extension feed item operation.
            $mutateOperations [] = new MutateOperation([
                'extension_feed_item_operation' => $extensionFeedItemOperation
            ]);
        }
        return $mutateOperations;
    }
}

RemoveEntireSitelinkCampaignExtensionSetting::main();

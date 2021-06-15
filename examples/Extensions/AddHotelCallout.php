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
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\HotelCalloutFeedItem;
use Google\Ads\GoogleAds\V8\Enums\ExtensionTypeEnum\ExtensionType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\AdGroupExtensionSetting;
use Google\Ads\GoogleAds\V8\Resources\CampaignExtensionSetting;
use Google\Ads\GoogleAds\V8\Resources\CustomerExtensionSetting;
use Google\Ads\GoogleAds\V8\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V8\Services\AdGroupExtensionSettingOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignExtensionSettingOperation;
use Google\Ads\GoogleAds\V8\Services\CustomerExtensionSettingOperation;
use Google\Ads\GoogleAds\V8\Services\ExtensionFeedItemOperation;
use Google\ApiCore\ApiException;

/**
 * This example adds a hotel callout extension to a specific account, campaign within the account,
 * and ad group within the campaign.
 */
class AddHotelCallout
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    private const CALLOUT_TEXT = 'INSERT_CALLOUT_TEXT_HERE';

    // See supported languages at:
    // https://developers.google.com/hotels/hotel-ads/api-reference/language-codes.
    private const LANGUAGE_CODE = 'INSERT_LANGUAGE_CODE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CALLOUT_TEXT => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::LANGUAGE_CODE => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::CALLOUT_TEXT] ?: self::CALLOUT_TEXT,
                $options[ArgumentNames::LANGUAGE_CODE] ?: self::LANGUAGE_CODE
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
     * @param int $adGroupId the ad group ID
     * @param string $calloutText the callout text
     * @param string $languageCode the language code
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        int $adGroupId,
        string $calloutText,
        string $languageCode
    ) {
        // Creates an extension feed item as hotel callout.
        $extensionFeedItemResourceName =
            self::addExtensionFeedItem($googleAdsClient, $customerId, $calloutText, $languageCode);

        // Adds the extension feed item to the account.
        self::addExtensionToAccount($googleAdsClient, $customerId, $extensionFeedItemResourceName);

        // Adds the extension feed item to the campaign.
        self::addExtensionToCampaign(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $extensionFeedItemResourceName
        );

        // Adds the extension feed item to the ad group.
        self::addExtensionToAdGroup(
            $googleAdsClient,
            $customerId,
            $adGroupId,
            $extensionFeedItemResourceName
        );
    }

    /**
     * Creates a new extension feed item for the callout extension.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $calloutText the callout text to be created
     * @param string $languageCode the language code for the callout text
     * @return string the created extension feed item's resource name
     */
    private static function addExtensionFeedItem(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $calloutText,
        string $languageCode
    ): string {
        // Creates the callout extension with the specified text and language.
        $hotelCalloutFeedItem = new HotelCalloutFeedItem([
            'text' => $calloutText,
            'language_code' => $languageCode
        ]);

        // Creates a feed item from the hotel callout extension.
        $extensionFeedItem =
            new ExtensionFeedItem(['hotel_callout_feed_item' => $hotelCalloutFeedItem]);

        // Creates an extension feed item operation.
        $extensionFeedItemOperation = new ExtensionFeedItemOperation();
        $extensionFeedItemOperation->setCreate($extensionFeedItem);

        // Issues a mutate request to add the extension feed item and print its information.
        $extensionFeedItemServiceClient = $googleAdsClient->getExtensionFeedItemServiceClient();
        $response = $extensionFeedItemServiceClient->mutateExtensionFeedItems(
            $customerId,
            [$extensionFeedItemOperation]
        );
        $extensionFeedItemResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created an extension feed item with resource name: '%s'.%s",
            $extensionFeedItemResourceName,
            PHP_EOL
        );

        return $extensionFeedItemResourceName;
    }

    /**
     * Adds the extension feed item to the customer account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $extensionFeedItemResourceName the extension feed item resource name
     */
    private static function addExtensionToAccount(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $extensionFeedItemResourceName
    ): void {
        // Creates a customer extension setting, sets its type to HOTEL_CALLOUT, and attaches the
        // feed item.
        $customerExtensionSetting = new CustomerExtensionSetting([
            'extension_type' => ExtensionType::HOTEL_CALLOUT,
            'extension_feed_items' => [$extensionFeedItemResourceName]
        ]);

        // Creates a customer extension setting operation.
        $customerExtensionSettingOperation = new CustomerExtensionSettingOperation();
        $customerExtensionSettingOperation->setCreate($customerExtensionSetting);

        // Issues a mutate request to add the customer extension setting and prints its information.
        $customerExtensionSettingServiceClient =
            $googleAdsClient->getCustomerExtensionSettingServiceClient();
        $response = $customerExtensionSettingServiceClient->mutateCustomerExtensionSettings(
            $customerId,
            [$customerExtensionSettingOperation]
        );
        printf(
            "Created a customer extension setting with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Adds the extension feed item to the specified campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     * @param string $extensionFeedItemResourceName the extension feed item resource name
     */
    private static function addExtensionToCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        string $extensionFeedItemResourceName
    ): void {
        // Creates a campaign extension setting, sets its type to HOTEL_CALLOUT, and attaches the
        // feed item.
        $campaignExtensionSetting = new CampaignExtensionSetting([
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
            'extension_type' => ExtensionType::HOTEL_CALLOUT,
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

    /**
     * Adds the extension feed item to the specified ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $adGroupId the ad group ID
     * @param string $extensionFeedItemResourceName the extension feed item resource name
     */
    private static function addExtensionToAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $extensionFeedItemResourceName
    ): void {
        // Creates an ad group extension setting, sets its type to HOTEL_CALLOUT, and attaches the
        // feed item.
        $adGroupExtensionSetting = new AdGroupExtensionSetting([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'extension_type' => ExtensionType::HOTEL_CALLOUT,
            'extension_feed_items' => [$extensionFeedItemResourceName]
        ]);

        // Creates an ad group extension setting operation.
        $adGroupExtensionSettingOperation = new AdGroupExtensionSettingOperation();
        $adGroupExtensionSettingOperation->setCreate($adGroupExtensionSetting);

        // Issues a mutate request to add the ad group extension setting and prints its information.
        $adGroupExtensionSettingServiceClient =
            $googleAdsClient->getAdGroupExtensionSettingServiceClient();
        $response = $adGroupExtensionSettingServiceClient->mutateAdGroupExtensionSettings(
            $customerId,
            [$adGroupExtensionSettingOperation]
        );
        printf(
            "Created an ad group extension setting with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

AddHotelCallout::main();

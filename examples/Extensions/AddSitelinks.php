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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V15\ResourceNames;
use Google\Ads\GoogleAds\V15\Common\AdScheduleInfo;
use Google\Ads\GoogleAds\V15\Common\KeywordInfo;
use Google\Ads\GoogleAds\V15\Common\SitelinkFeedItem;
use Google\Ads\GoogleAds\V15\Enums\DayOfWeekEnum\DayOfWeek;
use Google\Ads\GoogleAds\V15\Enums\ExtensionTypeEnum\ExtensionType;
use Google\Ads\GoogleAds\V15\Enums\FeedItemTargetDeviceEnum\FeedItemTargetDevice;
use Google\Ads\GoogleAds\V15\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V15\Enums\MinuteOfHourEnum\MinuteOfHour;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Resources\CampaignExtensionSetting;
use Google\Ads\GoogleAds\V15\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V15\Services\CampaignExtensionSettingOperation;
use Google\Ads\GoogleAds\V15\Services\ExtensionFeedItemOperation;
use Google\Ads\GoogleAds\V15\Services\MutateCampaignExtensionSettingsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateExtensionFeedItemsRequest;
use Google\ApiCore\ApiException;

/**
 * DEPRECATION WARNING!
 * THIS USAGE IS DEPRECATED AND WILL BE REMOVED IN AN UPCOMING API VERSION
 * All extensions should migrate to Assets. See AddSitelinksUsingAssets.php.
 *
 * Adds sitelinks to a campaign. To create a campaign, run AddCampaigns.php.
 */
class AddSitelinks
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
    // [START add_sitelinks_1]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $campaignResourceName = ResourceNames::forCampaign($customerId, $campaignId);

        // Creates extension feed items as sitelinks.
        $extensionFeedItems =
            self::createExtensionFeedItems($googleAdsClient, $customerId, $campaignResourceName);

        // Creates a campaign extension setting using the previously created extension feed items.
        $campaignExtensionSetting = new CampaignExtensionSetting([
            'campaign' => $campaignResourceName,
            'extension_type' => ExtensionType::SITELINK,
            'extension_feed_items' => $extensionFeedItems
        ]);

        // Creates the campaign extension setting operation.
        $campaignExtensionSettingOperation = new CampaignExtensionSettingOperation();
        $campaignExtensionSettingOperation->setCreate($campaignExtensionSetting);

        // Issues a mutate request to add the campaign extension setting.
        $campaignExtensionSettingServiceClient =
            $googleAdsClient->getCampaignExtensionSettingServiceClient();
        $response = $campaignExtensionSettingServiceClient->mutateCampaignExtensionSettings(
            MutateCampaignExtensionSettingsRequest::build(
                $customerId,
                [$campaignExtensionSettingOperation]
            )
        );

        // Prints the resource name of the created campaign extension setting.
        /** @var CampaignExtensionSetting $addedCampaignExtensionSetting */
        $addedCampaignExtensionSetting = $response->getResults()[0];
        printf(
            "Created a campaign extension setting with resource name: '%s'%s",
            $addedCampaignExtensionSetting->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_sitelinks_1]

    /**
     * Creates a list of extension feed items.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $campaignResourceName the resource name of the campaign to target
     * @return string[] the list of extension feed items' resource names
     */
    // [START add_sitelinks]
    private static function createExtensionFeedItems(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        // Creates the first sitelink feed item.
        $sitelinkFeedItem1 =
            self::createSitelinkFeedItem('Store Hours', 'http://www.example.com/storehours');

        // Creates an extension feed item from the sitelink feed item.
        $extensionFeedItem1 = new ExtensionFeedItem([
            'extension_type' => ExtensionType::SITELINK,
            'sitelink_feed_item' => $sitelinkFeedItem1,
            'targeted_campaign' => $campaignResourceName
        ]);

        // Creates the second sitelink feed item.
        $sitelinkFeedItem2 = self::createSitelinkFeedItem(
            'Thanksgiving Specials',
            'http://www.example.com/thanksgiving'
        );

        // Start date is set to November 20th. If it's already passed that date for this year,
        // use the same date for the next year instead.
        $targetYearString = date('Y');
        if (strtotime('now') > strtotime('20 November')) {
            $targetYearString = date('Y', strtotime('+1 year'));
        }
        $startTimeString = date('Y-m-d H:i:s', mktime(0, 0, 0, 11, 20, intval($targetYearString)));
        // Use the same year as start time when creating end time.
        $endTimeString = date('Y-m-d H:i:s', mktime(23, 59, 59, 11, 27, intval($targetYearString)));

        // Targets this sitelink for United States only.
        // A list of country codes can be referenced here:
        // https://developers.google.com/google-ads/api/reference/data/geotargets.
        $unitedStates = ResourceNames::forGeoTargetConstant(2840);

        // Creates an extension feed item from the sitelink feed item.
        $extensionFeedItem2 = new ExtensionFeedItem([
            'extension_type' => ExtensionType::SITELINK,
            'sitelink_feed_item' => $sitelinkFeedItem2,
            'targeted_campaign' => $campaignResourceName,
            'start_date_time' => $startTimeString,
            'end_date_time' => $endTimeString,
            'targeted_geo_target_constant' => $unitedStates
        ]);

        // Creates the third sitelink feed item.
        $sitelinkFeedItem3 =
            self::createSitelinkFeedItem('Wifi available', 'http://www.example.com/mobile/wifi');

        // Creates an extension feed item from the sitelink feed item.
        $extensionFeedItem3 = new ExtensionFeedItem([
            'extension_type' => ExtensionType::SITELINK,
            'sitelink_feed_item' => $sitelinkFeedItem3,
            'targeted_campaign' => $campaignResourceName,
            'device' => FeedItemTargetDevice::MOBILE,
            'targeted_keyword' => new KeywordInfo([
                'text' => 'free wifi',
                'match_type' => KeywordMatchType::BROAD
            ])
        ]);

        // Creates the fourth sitelink feed item.
        $sitelinkFeedItem4 =
            self::createSitelinkFeedItem('Happy hours', 'http://www.example.com/happyhours');

        // Creates an extension feed item from the sitelink feed item.
        $extensionFeedItem4 = new ExtensionFeedItem([
            'extension_type' => ExtensionType::SITELINK,
            'sitelink_feed_item' => $sitelinkFeedItem4,
            'targeted_campaign' => $campaignResourceName,
            'ad_schedules' => [
                self::createAdScheduleInfo(
                    DayOfWeek::MONDAY,
                    18,
                    MinuteOfHour::ZERO,
                    21,
                    MinuteOfHour::ZERO
                ),
                self::createAdScheduleInfo(
                    DayOfWeek::TUESDAY,
                    18,
                    MinuteOfHour::ZERO,
                    21,
                    MinuteOfHour::ZERO
                ),
                self::createAdScheduleInfo(
                    DayOfWeek::WEDNESDAY,
                    18,
                    MinuteOfHour::ZERO,
                    21,
                    MinuteOfHour::ZERO
                ),
                self::createAdScheduleInfo(
                    DayOfWeek::THURSDAY,
                    18,
                    MinuteOfHour::ZERO,
                    21,
                    MinuteOfHour::ZERO
                ),
                self::createAdScheduleInfo(
                    DayOfWeek::FRIDAY,
                    18,
                    MinuteOfHour::ZERO,
                    21,
                    MinuteOfHour::ZERO
                )
            ]
        ]);

        // Issues a mutate request to add the extension feed items.
        $extensionFeedItemServiceClient = $googleAdsClient->getExtensionFeedItemServiceClient();
        $response = $extensionFeedItemServiceClient->mutateExtensionFeedItems(
            MutateExtensionFeedItemsRequest::build(
                $customerId,
                [
                    new ExtensionFeedItemOperation(['create' => $extensionFeedItem1]),
                    new ExtensionFeedItemOperation(['create' => $extensionFeedItem2]),
                    new ExtensionFeedItemOperation(['create' => $extensionFeedItem3]),
                    new ExtensionFeedItemOperation(['create' => $extensionFeedItem4])
                ]
            )
        );

        // Prints some information about the created extension feed items.
        printf(
            "Created %d extension feed items with the following resource names:%s",
            $response->getResults()->count(),
            PHP_EOL
        );
        $createdExtensionFeedItemsResourceNames = [];
        foreach ($response->getResults() as $addedExtensionFeedItem) {
            /** @var ExtensionFeedItem $addedExtensionFeedItem */
            $addedExtensionFeedItemResourceName = $addedExtensionFeedItem->getResourceName();
            print $addedExtensionFeedItemResourceName . PHP_EOL;
            $createdExtensionFeedItemsResourceNames[] = $addedExtensionFeedItemResourceName;
        }
        return $createdExtensionFeedItemsResourceNames;
    }
    // [END add_sitelinks]

    /**
     * Creates a new sitelink feed item with the specified attributes.
     *
     * @param $sitelinkText string the text of the sitelink feed item
     * @param $sitelinkUrl string the URL of the sitelink feed item
     * @return SitelinkFeedItem the created sitelink feed item
     */
    private static function createSitelinkFeedItem(string $sitelinkText, string $sitelinkUrl)
    {
        return new SitelinkFeedItem(['link_text' => $sitelinkText, 'final_urls' => [$sitelinkUrl]]);
    }

    /**
     * Creates a new ad schedule info object with the specified attributes.
     *
     * @param int $day the enum value of day of the week of the ad schedule info
     * @param int $startHour the starting hour of the ad schedule info
     * @param int $startMinute the enum value of the starting minute of the ad schedule info
     * @param int $endHour the ending hour of the ad schedule info
     * @param int $endMinute the enum value of ending minute of the ad schedule info
     * @return AdScheduleInfo the created ad schedule info
     */
    private static function createAdScheduleInfo(
        int $day,
        int $startHour,
        int $startMinute,
        int $endHour,
        int $endMinute
    ) {
        return new AdScheduleInfo([
            'day_of_week' => $day,
            'start_hour' => $startHour,
            'start_minute' => $startMinute,
            'end_hour' => $endHour,
            'end_minute' => $endMinute
        ]);
    }
}

AddSitelinks::main();

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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\AdScheduleInfo;
use Google\Ads\GoogleAds\V8\Common\AdTextAsset;
use Google\Ads\GoogleAds\V8\Common\KeywordThemeInfo;
use Google\Ads\GoogleAds\V8\Common\LocationInfo;
use Google\Ads\GoogleAds\V8\Common\SmartCampaignAdInfo;
use Google\Ads\GoogleAds\V8\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V8\Enums\AdTypeEnum\AdType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Enums\BudgetTypeEnum\BudgetType;
use Google\Ads\GoogleAds\V8\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V8\Enums\CriterionTypeEnum\CriterionType;
use Google\Ads\GoogleAds\V8\Enums\DayOfWeekEnum\DayOfWeek;
use Google\Ads\GoogleAds\V8\Enums\MinuteOfHourEnum\MinuteOfHour;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroup;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V8\Resources\KeywordThemeConstant;
use Google\Ads\GoogleAds\V8\Resources\SmartCampaignSetting;
use Google\Ads\GoogleAds\V8\Resources\SmartCampaignSetting\PhoneNumber;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\Ads\GoogleAds\V8\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateOperation;
use Google\Ads\GoogleAds\V8\Services\MutateOperationResponse;
use Google\Ads\GoogleAds\V8\Services\SmartCampaignSettingOperation;
use Google\Ads\GoogleAds\V8\Services\SmartCampaignSuggestionInfo;
use Google\Ads\GoogleAds\V8\Services\SmartCampaignSuggestionInfo\LocationList;
use Google\ApiCore\ApiException;
use InvalidArgumentException;

/**
 * This example adds a Smart campaign.
 *
 * More details on Smart campaigns can be found here:
 * https://support.google.com/google-ads/answer/7652860
 */
class AddSmartCampaign
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: Specify the keyword text used to generate a set of keyword themes, which are used
    // to improve the budget suggestion and performance of the Smart campaign.
    private const KEYWORD_TEXT = 'travel';
    // Optional: Specify the ID of a Google My Business (GMB) location. This is required if a
    // business name is not provided. It can be retrieved using the GMB API, see:
    // https://developers.google.com/my-business/reference/rest/v4/accounts.locations.
    private const BUSINESS_LOCATION_ID = null;
    // Optional: Specify the name of a Google My Business (GMB) business. This is required if a
    // business location ID is not provided.
    private const BUSINESS_NAME = null;

    // Geo target constant for New York City.
    private const GEO_TARGET_CONSTANT = '1023191';
    // Country code is a two-letter ISO-3166 code, for a list of all codes see:
    // https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-16
    private const COUNTRY_CODE = 'US';
    // For a list of all language codes, see:
    // https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-7
    private const LANGUAGE_CODE = 'en';
    private const LANDING_PAGE_URL = 'http://www.example.com';
    private const PHONE_NUMBER = '555-555-5555';
    private const BUDGET_TEMPORARY_ID = '-1';
    private const SMART_CAMPAIGN_TEMPORARY_ID = '-2';
    private const AD_GROUP_TEMPORARY_ID = '-3';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::KEYWORD_TEXT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::BUSINESS_LOCATION_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::BUSINESS_NAME => GetOpt::OPTIONAL_ARGUMENT
        ]);
        $businessLocationId = $options[ArgumentNames::BUSINESS_LOCATION_ID] ?:
            self::BUSINESS_LOCATION_ID;
        $businessName = $options[ArgumentNames::BUSINESS_NAME] ?: self::BUSINESS_NAME;
        if ($businessLocationId && $businessName) {
            throw new InvalidArgumentException(
                'Both the business location ID and business name are provided but they are '
                . 'mutually exclusive. Please only set a value for one of them.'
            );
        }
        if (!$businessLocationId && !$businessName) {
            throw new InvalidArgumentException(
                'Neither the business location ID nor the business name are provided. Please set '
                . 'a value for one of them.'
            );
        }

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
                $options[ArgumentNames::KEYWORD_TEXT] ?: self::KEYWORD_TEXT,
                $businessLocationId,
                $businessName
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
     * @param string $keywordText a keyword text used for generating keyword themes
     * @param string|null $businessLocationId the ID of a Google My Business location
     * @param string|null $businessName the name of a Google My Business
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $keywordText,
        ?string $businessLocationId,
        ?string $businessName
    ) {
        $keywordThemeConstants = self::getKeywordThemeConstants($googleAdsClient, $keywordText);
        // Maps the list of KeywordThemeConstants to KeywordThemeInfos.
        $keywordThemeInfos = array_map(function (KeywordThemeConstant $constant) {
            return new KeywordThemeInfo([
                'keyword_theme_constant' => $constant->getResourceName()
            ]);
        }, $keywordThemeConstants);
        $suggestedBudgetAmount = self::getBudgetSuggestion(
            $googleAdsClient,
            $customerId,
            $businessLocationId,
            $keywordThemeInfos
        );

        // [START add_smart_campaign_7]
        // The below methods create and return MutateOperations that we later provide to the
        // GoogleAdsService.Mutate method in order to create the entities in a single request.
        // Since the entities for a Smart campaign are closely tied to one-another it's considered
        // a best practice to create them in a single Mutate request so they all complete
        // successfully or fail entirely, leaving no orphaned entities.
        // See: https://developers.google.com/google-ads/api/docs/mutating/overview.
        $campaignBudgetOperation = self::createCampaignBudgetOperation(
            $customerId,
            $suggestedBudgetAmount
        );
        $smartCmpaignOperation = self::createSmartCampaignOperation($customerId);
        $smartCampaignSettingOperation = self::createSmartCampaignSettingOperation(
            $customerId,
            $businessLocationId,
            $businessName
        );
        $campaignCriterionOperations = self::createCampaignCriterionOperations(
            $customerId,
            $keywordThemeInfos
        );
        $adGroupOperation = self::createAdGroupOperation($customerId);
        $adGroupAdOperation = self::createAdGroupAdOperation($customerId);

        // Issues a single mutate request to add the entities.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->mutate(
            $customerId,
            // It's important to create these entities in this order because they depend on
            // each other, for example the SmartCampaignSetting and ad group depend on the
            // campaign, and the ad group ad depends on the ad group.
            array_merge(
                [
                    $campaignBudgetOperation,
                    $smartCmpaignOperation,
                    $smartCampaignSettingOperation,
                ],
                $campaignCriterionOperations,
                [
                    $adGroupOperation,
                    $adGroupAdOperation
                ]
            )
        );

        self::printResponseDetails($response);
    }
    // [END add_smart_campaign_7]

    /**
     * Retrieves KeywordThemeConstants for the given criteria.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $keywordText a keyword text used for generating keyword themes
     * @return KeywordThemeConstant[] a list of KeywordThemeConstants
     */
    // [START add_smart_campaign]
    private static function getKeywordThemeConstants(
        GoogleAdsClient $googleAdsClient,
        string $keywordText
    ): array {
        $keywordThemeConstantService = $googleAdsClient->getKeywordThemeConstantServiceClient();

        // Issues a request to retrieve the keyword theme constants.
        $response = $keywordThemeConstantService->suggestKeywordThemeConstants([
            'queryText' => $keywordText,
            'countryCode' => self::COUNTRY_CODE,
            'languageCode' => self::LANGUAGE_CODE
        ]);

        printf(
            "Retrieved %d keyword theme constants using the keyword: '%s'.%s",
            $response->getKeywordThemeConstants()->count(),
            $keywordText,
            PHP_EOL
        );
        return iterator_to_array($response->getKeywordThemeConstants()->getIterator());
    }
    // [END add_smart_campaign]

    /**
     * Retrieves a suggested budget amount for a new budget.
     *
     * Using the SmartCampaignSuggestService to determine a daily budget for new and existing
     * Smart campaigns is highly recommended because it helps the campaigns achieve optimal
     * performance.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string|null $businessLocationId the ID of a Google My Business location
     * @param KeywordThemeInfo[] $keywordThemeInfos a list of KeywordThemeInfos
     * @return int a daily budget amount in micros
     */
    // [START add_smart_campaign_1]
    private static function getBudgetSuggestion(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?string $businessLocationId,
        array $keywordThemeInfos
    ): int {
        $suggestionData = [
            // You can retrieve suggestions for an existing campaign by setting the "campaign"
            // field equal to the resource name of a campaign and leaving the rest below unset:
            // 'campaign' => 'INSERT_CAMPAIGN_RESOURCE_NAME_HERE'

            // Since these suggestions are for a new campaign, we're going to use the
            // suggestion_info field instead.
            'suggestion_info' => new SmartCampaignSuggestionInfo([
                // Adds the URL of the campaign's landing page.
                'final_url' => self::LANDING_PAGE_URL,

                // Constructs location information using the given geo target constant. It's also
                // possible to provide a geographic proximity using the "proximity" field,
                // for example:
                //
                // 'proximity' => new ProximityInfo([
                //     'address' => mew AddressInfo([
                //         'post_code' => INSERT_POSTAL_CODE,
                //         'province_code' => INSERT_PROVINCE_CODE,
                //         'country_code' => INSERT_COUNTRY_CODE,
                //         'province_name' => INSERT_PROVINCE_NAME,
                //         'street_address' => INSERT_STREET_ADDRESS,
                //         'street_address2' => INSERT_STREET_ADDRESS_2,
                //         'city_name' => INSERT_CITY_NAME
                //     ]),
                //     'radius' => INSERT_RADIUS,
                //     'radius_units' => INSERT_RADIUS_UNITS
                // ])
                //
                // For more information on proximities see:
                // https://developers.google.com/google-ads/api/reference/rpc/latest/ProximityInfo

                // Adds LocationInfo objects to the list of locations. You have the option of
                // providing multiple locations when using location-based suggestions.
                'location_list' => new LocationList([
                    // Sets one location to the resource name of the given geo target constant.
                    'locations' => [new LocationInfo([
                        'geo_target_constant' => ResourceNames::forGeoTargetConstant(
                            self::GEO_TARGET_CONSTANT
                        )
                    ])]
                ]),

                // Adds the KeywordThemeInfo objects.
                'keyword_themes' => $keywordThemeInfos,

                // Adds a schedule detailing which days of the week the business is open.
                // This schedule describes a schedule in which the business is open on
                // Mondays from 9am to 5pm.
                'ad_schedules' => [new AdScheduleInfo([
                    // Sets the day of this schedule as Monday.
                    'day_of_week' => DayOfWeek::MONDAY,
                    // Sets the start hour to 9am.
                    'start_hour' => 9,
                    // Sets the end hour to 5pm.
                    'end_hour' => 17,
                    // Sets the start and end minute of zero, for example: 9:00 and 5:00.
                    'start_minute' => MinuteOfHour::ZERO,
                    'end_minute' => MinuteOfHour::ZERO
                ])]
            ])
        ];

        // Adds the GMB location ID if it is provided and if the "suggestion_info" field is set.
        if (array_key_exists('suggestion_info', $suggestionData) && $businessLocationId) {
            $suggestionData['suggestion_info']->setBusinessLocationId($businessLocationId);
        }

        // Issues a request to retrieve a budget suggestion.
        $smartCampaignSuggestService = $googleAdsClient->getSmartCampaignSuggestServiceClient();
        $response = $smartCampaignSuggestService->suggestSmartCampaignBudgetOptions(
            $customerId,
            $suggestionData
        );

        // Three tiers of options will be returned, a "low", "high" and "recommended". Here we will
        // use the "recommended" option. The amount is specified in micros, where one million is
        // equivalent to one currency unit.
        $recommendation = $response->getRecommended();
        printf(
            "A daily budget amount of %d micros was suggested, garnering an estimated minimum of "
            . "%d clicks and an estimated maximum of %d per day.%s",
            $recommendation->getDailyAmountMicros(),
            $recommendation->getMetrics()->getMinDailyClicks(),
            $recommendation->getMetrics()->getMaxDailyClicks(),
            PHP_EOL
        );

        return $recommendation->getDailyAmountMicros();
    }
    // [END add_smart_campaign_1]

    /**
     * Creates a MutateOperation that creates a new CampaignBudget.
     *
     * A temporary ID will be assigned to this campaign budget so that it can be referenced by
     * other objects being created in the same Mutate request.
     *
     * @param int $customerId the customer ID
     * @param int $suggestedBudgetAmount a daily budget amount in micros
     * @return MutateOperation a MutateOperation that creates a CampaignBudget
     */
    // [START add_smart_campaign_2]
    private static function createCampaignBudgetOperation(
        int $customerId,
        int $suggestedBudgetAmount
    ): MutateOperation {
        // Creates the campaign budget object.
        $campaignBudget = new CampaignBudget([
            'name' => "Smart campaign budget #" . Helper::getPrintableDatetime(),
            // A budget used for Smart campaigns must have the type SMART_CAMPAIGN.
            'type' => BudgetType::SMART_CAMPAIGN,
            // The suggested budget amount from the SmartCampaignSuggestService is a daily budget.
            // We don't need to specify that here, because the budget period already defaults to
            // DAILY.
            'amount_micros' => $suggestedBudgetAmount,
            // Sets a temporary ID in the budget's resource name so it can be referenced by the
            // campaign in later steps.
            'resource_name' =>
                ResourceNames::forCampaignBudget($customerId, self::BUDGET_TEMPORARY_ID)
        ]);

        // Creates the MutateOperation that creates the campaign budget.
        return new MutateOperation([
            'campaign_budget_operation' => new CampaignBudgetOperation([
                'create' => $campaignBudget
            ])
        ]);
    }
    // [END add_smart_campaign_2]

    /**
     * Creates a MutateOperation that creates a new Smart campaign.
     *
     * A temporary ID will be assigned to this campaign so that it can be referenced by other
     * objects being created in the same Mutate request.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation a MutateOperation that creates a campaign
     */
    // [START add_smart_campaign_3]
    private static function createSmartCampaignOperation(int $customerId): MutateOperation
    {
        // Creates the campaign object.
        $campaign = new Campaign([
            'name' => "Smart campaign #" . Helper::getPrintableDatetime(),
            // Sets the campaign status as PAUSED. The campaign is the only entity in the mutate
            // request that should have its' status set.
            'status' => CampaignStatus::PAUSED,
            // The advertising channel type is required to be SMART.
            'advertising_channel_type' => AdvertisingChannelType::SMART,
            // The advertising channel sub type is required to be SMART_CAMPAIGN.
            'advertising_channel_sub_type' => AdvertisingChannelSubType::SMART_CAMPAIGN,
            // Assigns the resource name with a temporary ID.
            'resource_name' =>
                ResourceNames::forCampaign($customerId, self::SMART_CAMPAIGN_TEMPORARY_ID),
            // Sets the budget using the given budget resource name.
            'campaign_budget' =>
                ResourceNames::forCampaignBudget($customerId, self::BUDGET_TEMPORARY_ID)
        ]);

        // Creates the MutateOperation that creates the campaign.
        return new MutateOperation([
            'campaign_operation' => new CampaignOperation(['create' => $campaign])
        ]);
    }
    // [END add_smart_campaign_3]

    /**
     * Creates a MutateOperation to create a new SmartCampaignSetting.
     *
     * SmartCampaignSettings are unique in that they only support UPDATE operations, which are
     * used to update and create them. Below we will use a temporary ID in the resource name to
     * associate it with the campaign created in the previous step.
     *
     * @param int $customerId the customer ID
     * @param string|null $businessLocationId the ID of a Google My Business location
     * @param string|null $businessName the name of a Google My Business
     * @return MutateOperation a MutateOperation that creates a SmartCampaignSetting
     */
    // [START add_smart_campaign_4]
    private static function createSmartCampaignSettingOperation(
        int $customerId,
        ?string $businessLocationId,
        ?string $businessName
    ): MutateOperation {
        // Creates the smart campaign setting object.
        $smartCampaignSetting = new SmartCampaignSetting([
            // Sets a temporary ID in the campaign setting's resource name to associate it with
            // the campaign created in the previous step.
            'resource_name' => ResourceNames::forSmartCampaignSetting(
                $customerId,
                self::SMART_CAMPAIGN_TEMPORARY_ID
            ),
            // Below we configure the SmartCampaignSetting using many of the same details used to
            // generate a budget suggestion.
            'phone_number' => new PhoneNumber([
                'country_code' => self::COUNTRY_CODE,
                'phone_number' => self::PHONE_NUMBER
            ]),
            'final_url' => self::LANDING_PAGE_URL,
            'advertising_language_code' => self::LANGUAGE_CODE,
        ]);

        // It's required that either a business location ID or a business name is added to the
        // SmartCampaignSetting.
        if ($businessLocationId) {
            $smartCampaignSetting->setBusinessLocationId($businessLocationId);
        } else {
            $smartCampaignSetting->setBusinessName($businessName);
        }

        // Creates the MutateOperation that creates the smart campaign setting with an update.
        return new MutateOperation([
            'smart_campaign_setting_operation' => new SmartCampaignSettingOperation([
                'update' => $smartCampaignSetting,
                // Sets the update mask on the operation. This is required since the smart campaign
                // setting is created in an UPDATE operation. Here the update mask will be a list
                // of all the fields that were set on the SmartCampaignSetting.
                'update_mask' => FieldMasks::allSetFieldsOf($smartCampaignSetting)
            ])
        ]);
    }
    // [END add_smart_campaign_4]

    /**
     * Creates a list of MutateOperations that create new campaign criteria.
     *
     * @param int $customerId the customer ID
     * @param KeywordThemeInfo[] $keywordThemeInfos a list of KeywordThemeInfos
     * @return MutateOperation[] a list of MutateOperations that create new campaign criteria
     */
    // [START add_smart_campaign_8]
    private static function createCampaignCriterionOperations(
        int $customerId,
        array $keywordThemeInfos
    ): array {
        $operations = [];
        foreach ($keywordThemeInfos as $info) {
            // Creates the campaign criterion object.
            $campaignCriterion = new CampaignCriterion([
                // Sets the campaign ID to a temporary ID.
                'campaign' =>
                    ResourceNames::forCampaign($customerId, self::SMART_CAMPAIGN_TEMPORARY_ID),
                // Sets the criterion type to KEYWORD_THEME.
                'type' => CriterionType::KEYWORD_THEME,
                // Sets the keyword theme to the given KeywordThemeInfo.
                'keyword_theme' => $info
            ]);

            // Creates the MutateOperation that creates the campaign criterion and adds it to the
            // list of operations.
            $operations[] = new MutateOperation([
                'campaign_criterion_operation' => new CampaignCriterionOperation([
                    'create' => $campaignCriterion
                ])
            ]);
        }

        return $operations;
    }
    // [END add_smart_campaign_8]

    /**
     * Creates a MutateOperation that creates a new ad group.
     *
     * A temporary ID will be used in the campaign resource name for this ad group to associate
     * it with the Smart campaign created in earlier steps. A temporary ID will also be used for
     * its own resource name so that we can associate an ad group ad with it later in the process.
     *
     * Only one ad group can be created for a given Smart campaign.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation a MutateOperation that creates a new ad group
     */
    // [START add_smart_campaign_5]
    private static function createAdGroupOperation(int $customerId): MutateOperation
    {
        // Creates the ad group object.
        $adGroup = new AdGroup([
            // Sets the ad group ID to a temporary ID.
            'resource_name' => ResourceNames::forAdGroup($customerId, self::AD_GROUP_TEMPORARY_ID),
            'name' => "Smart campaign ad group #" . Helper::getPrintableDatetime(),
            // Sets the campaign ID to a temporary ID.
            'campaign' =>
                ResourceNames::forCampaign($customerId, self::SMART_CAMPAIGN_TEMPORARY_ID),
            // The ad group type must be set to SMART_CAMPAIGN_ADS.
            'type' => AdGroupType::SMART_CAMPAIGN_ADS
        ]);

        // Creates the MutateOperation that creates the ad group.
        return new MutateOperation([
            'ad_group_operation' => new AdGroupOperation(['create' => $adGroup])
        ]);
    }
    // [END add_smart_campaign_5]

    /**
     * Creates a MutateOperation that creates a new ad group ad.
     *
     * A temporary ID will be used in the ad group resource name for this ad group ad to associate
     * it with the ad group created in earlier steps.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation a MutateOperation that creates a new ad group ad
     */
    // [START add_smart_campaign_6]
    private static function createAdGroupAdOperation(int $customerId): MutateOperation
    {
        // Creates the ad group ad object.
        $adGroupAd = new AdGroupAd([
            // Sets the ad group ID to a temporary ID.
            'ad_group' => ResourceNames::forAdGroup($customerId, self::AD_GROUP_TEMPORARY_ID),
            'ad' => new Ad([
                // Sets the type to SMART_CAMPAIGN_AD.
                'type' => AdType::SMART_CAMPAIGN_AD,
                'smart_campaign_ad' => new SmartCampaignAdInfo([
                    // At most, three headlines can be specified for a Smart campaign ad.
                    'headlines' => [
                        new AdTextAsset(['text' => 'Headline number one']),
                        new AdTextAsset(['text' => 'Headline number two']),
                        new AdTextAsset(['text' => 'Headline number three'])
                    ],
                    // At most, two descriptions can be specified for a Smart campaign ad.
                    'descriptions' => [
                        new AdTextAsset(['text' => 'Description number one']),
                        new AdTextAsset(['text' => 'Description number two'])
                    ]
                ])
            ])
        ]);

        // Creates the MutateOperation that creates the ad group ad.
        return new MutateOperation([
            'ad_group_ad_operation' => new AdGroupAdOperation(['create' => $adGroupAd])
        ]);
    }
    // [END add_smart_campaign_6]

    /**
     * Prints the details of a MutateGoogleAdsResponse.
     *
     * It only covers the expected types of operation result.
     *
     * @param MutateGoogleAdsResponse $response a MutateGoogleAdsResponse object
     */
    private static function printResponseDetails(MutateGoogleAdsResponse $response)
    {
        // Parses the Mutate response to print details about the entities that were created by the
        // request.
        /** @var MutateOperationResponse $result */
        foreach ($response->getMutateOperationResponses() as $result) {
            $resourceType = "unrecognized";
            $resourceName = "not found";
            if ($result->hasCampaignBudgetResult()) {
                $resourceType = "CampaignBudget";
                $resourceName = $result->getCampaignBudgetResult()->getResourceName();
            } else if ($result->hasCampaignResult()) {
                $resourceType = "Campaign";
                $resourceName = $result->getCampaignResult()->getResourceName();
            } else if ($result->hasSmartCampaignSettingResult()) {
                $resourceType = "SmartCampaignSetting";
                $resourceName = $result->getSmartCampaignSettingResult()->getResourceName();
            } else if ($result->getAdGroupResult()) {
                $resourceType = "AdGroup";
                $resourceName = $result->getAdGroupResult()->getResourceName();
            } else if ($result->getAdGroupAdResult()) {
                $resourceType = "AdGroupAd";
                $resourceName = $result->getAdGroupAdResult()->getResourceName();
            } else if ($result->getCampaignCriterionResult()) {
                $resourceType = "CampaignCriterion";
                $resourceName = $result->getCampaignCriterionResult()->getResourceName();
            }
            printf(
                "Created a(n) '%s' entity with resource_name: '%s'.%s",
                $resourceType,
                $resourceName,
                PHP_EOL
            );
        }
    }
}

AddSmartCampaign::main();

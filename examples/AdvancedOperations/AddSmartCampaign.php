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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdScheduleInfo;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\KeywordThemeInfo;
use Google\Ads\GoogleAds\V18\Common\LocationInfo;
use Google\Ads\GoogleAds\V18\Common\SmartCampaignAdInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V18\Enums\AdTypeEnum\AdType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelSubTypeEnum\AdvertisingChannelSubType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\BudgetTypeEnum\BudgetType;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\DayOfWeekEnum\DayOfWeek;
use Google\Ads\GoogleAds\V18\Enums\MinuteOfHourEnum\MinuteOfHour;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Resources\KeywordThemeConstant;
use Google\Ads\GoogleAds\V18\Resources\SmartCampaignSetting;
use Google\Ads\GoogleAds\V18\Resources\SmartCampaignSetting\PhoneNumber;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V18\Services\MutateOperation;
use Google\Ads\GoogleAds\V18\Services\MutateOperationResponse;
use Google\Ads\GoogleAds\V18\Services\SmartCampaignSettingOperation;
use Google\Ads\GoogleAds\V18\Services\SmartCampaignSuggestionInfo;
use Google\Ads\GoogleAds\V18\Services\SmartCampaignSuggestionInfo\BusinessContext;
use Google\Ads\GoogleAds\V18\Services\SmartCampaignSuggestionInfo\LocationList;
use Google\Ads\GoogleAds\V18\Services\SuggestKeywordThemeConstantsRequest;
use Google\Ads\GoogleAds\V18\Services\SuggestKeywordThemesRequest;
use Google\Ads\GoogleAds\V18\Services\SuggestKeywordThemesResponse\KeywordTheme;
use Google\Ads\GoogleAds\V18\Services\SuggestSmartCampaignAdRequest;
use Google\Ads\GoogleAds\V18\Services\SuggestSmartCampaignBudgetOptionsRequest;
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
    // Optional: Specify a keyword text used to retrieve keyword theme constant suggestions from the
    // KeywordThemeConstantService. These keyword theme suggestions are generated using
    // auto-completion data for the given text and may help improve the performance of the Smart
    // campaign.
    private const KEYWORD_TEXT = null;
    // Optional: A keyword text used to create a free-form keyword theme, which is entirely
    // user-specified and not derived from any suggestion service. Using free-form keyword themes is
    // typically not recommended because they are less effective than suggested keyword themes,
    // however they are useful in situations where a very specific term needs to be targeted.
    private const FREE_FORM_KEYWORD_TEXT = null;
    // Optional: Specify the resource name of a Business Profile location. This is required if a
    // business name is not provided. It can be retrieved using the Business Profile API, see:
    // https://developers.google.com/my-business/reference/businessinformation/rest/v1/accounts.locations
    // or from the Business Profile UI (https://support.google.com/business/answer/10737668).
    private const BUSINESS_PROFILE_LOCATION = null;
    // Optional: Specify the name of a Business Profile business. This is required if a
    // business profile location is not provided.
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
    private const PHONE_NUMBER = '800-555-0100';
    private const BUDGET_TEMPORARY_ID = '-1';
    private const SMART_CAMPAIGN_TEMPORARY_ID = '-2';
    private const AD_GROUP_TEMPORARY_ID = '-3';
    // These define the minimum number of headlines and descriptions that are
    // required to create an ad group ad in a Smart campaign.
    private const NUM_REQUIRED_HEADLINES = 3;
    private const NUM_REQUIRED_DESCRIPTIONS = 2;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::KEYWORD_TEXT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::FREE_FORM_KEYWORD_TEXT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::BUSINESS_PROFILE_LOCATION => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::BUSINESS_NAME => GetOpt::OPTIONAL_ARGUMENT
        ]);
        $businessProfileLocation =
            $options[ArgumentNames::BUSINESS_PROFILE_LOCATION] ?: self::BUSINESS_PROFILE_LOCATION;
        $businessName = $options[ArgumentNames::BUSINESS_NAME] ?: self::BUSINESS_NAME;
        if ($businessProfileLocation && $businessName) {
            throw new InvalidArgumentException(
                'Both the business location resource name and business name are provided but they '
                . 'are mutually exclusive. Please only set a value for one of them.'
            );
        }
        if (!$businessProfileLocation && !$businessName) {
            throw new InvalidArgumentException(
                'Neither the business location resource name nor the business name are provided. '
                . 'Please set a value for one of them.'
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
                $options[ArgumentNames::FREE_FORM_KEYWORD_TEXT] ?: self::FREE_FORM_KEYWORD_TEXT,
                $businessProfileLocation,
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
     * @param string|null $keywordText a keyword text used for generating keyword themes
     * @param string|null $freeFormKeywordText a keyword used to create a free-form keyword theme
     * @param string|null $businessProfileLocationResourceName the resource name of a Business
     *     Profile location
     * @param string|null $businessName the name of a Business Profile
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?string $keywordText,
        ?string $freeFormKeywordText,
        ?string $businessProfileLocationResourceName,
        ?string $businessName
    ) {
        // [START add_smart_campaign_12]
        // Gets the SmartCampaignSuggestionInfo object which acts as the basis for many of the
        // entities necessary to create a Smart campaign. It will be reused a number of times to
        // retrieve suggestions for keyword themes, budget amount, ads, and campaign criteria.
        $suggestionInfo = self::getSmartCampaignSuggestionInfo(
            $businessProfileLocationResourceName,
            $businessName
        );

        // Generates a list of keyword themes using the SuggestKeywordThemes method on the
        // SmartCampaignSuggestService. It is strongly recommended that you use this strategy for
        // generating keyword themes.
        $keywordThemes =
            self::getKeywordThemeSuggestions($googleAdsClient, $customerId, $suggestionInfo);

        // Optionally retrieves auto-complete suggestions for the given keyword text and adds them
        // to the list of keyword themes.
        if (!empty($keywordText)) {
            $keywordThemes = array_merge(
                $keywordThemes,
                self::getKeywordTextAutoCompletions($googleAdsClient, $keywordText)
            );
        }

        // Maps the list of KeywordThemes to KeywordThemeInfos.
        $keywordThemeInfos = array_map(function (KeywordTheme $keywordTheme) {
            if ($keywordTheme->getKeywordThemeConstant()) {
                return new KeywordThemeInfo([
                    'keyword_theme_constant' => $keywordTheme->getKeywordThemeConstant()
                        ->getResourceName()
                ]);
            } elseif ($keywordTheme->getFreeFormKeywordTheme()) {
                return new KeywordThemeInfo([
                    'free_form_keyword_theme' => $keywordTheme->getFreeFormKeywordTheme()
                ]);
            } else {
                throw new \UnexpectedValueException(
                    'A malformed KeywordTheme was encountered: ' . $keywordTheme->getKeywordTheme()
                );
            }
        }, $keywordThemes);

        // [START add_smart_campaign_13]
        // Optionally includes any free-form keywords in verbatim.
        if (!empty($freeFormKeywordText)) {
            $keywordThemeInfos[] =
                new KeywordThemeInfo(['free_form_keyword_theme' => $freeFormKeywordText]);
        }
        // [END add_smart_campaign_13]
        // Includes the keyword suggestions in the overall SuggestionInfo object.
        $suggestionInfo = $suggestionInfo->setKeywordThemes($keywordThemeInfos);
        // [END add_smart_campaign_12]

        $suggestedBudgetAmount = self::getBudgetSuggestion(
            $googleAdsClient,
            $customerId,
            $suggestionInfo
        );
        $adSuggestions = self::getAdSuggestions($googleAdsClient, $customerId, $suggestionInfo);

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
        $smartCampaignOperation = self::createSmartCampaignOperation($customerId);
        $smartCampaignSettingOperation = self::createSmartCampaignSettingOperation(
            $customerId,
            $businessProfileLocationResourceName,
            $businessName
        );
        $campaignCriterionOperations = self::createCampaignCriterionOperations(
            $customerId,
            $keywordThemeInfos,
            $suggestionInfo
        );
        $adGroupOperation = self::createAdGroupOperation($customerId);
        $adGroupAdOperation = self::createAdGroupAdOperation($customerId, $adSuggestions);

        // Issues a single mutate request to add the entities.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->mutate(MutateGoogleAdsRequest::build(
            $customerId,
            // It's important to create these entities in this order because they depend on
            // each other, for example the SmartCampaignSetting and ad group depend on the
            // campaign, and the ad group ad depends on the ad group.
            array_merge(
                [
                    $campaignBudgetOperation,
                    $smartCampaignOperation,
                    $smartCampaignSettingOperation,
                ],
                $campaignCriterionOperations,
                [
                    $adGroupOperation,
                    $adGroupAdOperation
                ]
            )
        ));

        self::printResponseDetails($response);
    }
    // [END add_smart_campaign_7]

    /**
     * Retrieves KeywordThemes using the given suggestion info.
     *
     * Here we use the SuggestKeywordThemes method, which uses all of the business details included
     * in the given SmartCampaignSuggestionInfo instance to generate keyword theme suggestions. This
     * is the recommended way to generate keyword themes because it uses detailed information about
     * your business, its location, and website content to generate keyword themes.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param SmartCampaignSuggestionInfo $suggestionInfo instance with details
     *     about the business being advertised
     * @return KeywordTheme[] a list of KeywordThemes
     */
    // [START add_smart_campaign_11]
    private static function getKeywordThemeSuggestions(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        SmartCampaignSuggestionInfo $suggestionInfo
    ): array {
        $smartCampaignSuggestServiceClient =
            $googleAdsClient->getSmartCampaignSuggestServiceClient();

        // Issues a request to retrieve the keyword themes.
        $response = $smartCampaignSuggestServiceClient->suggestKeywordThemes(
            (new SuggestKeywordThemesRequest())
                ->setCustomerId($customerId)
                ->setSuggestionInfo($suggestionInfo)
        );

        printf(
            "Retrieved %d keyword theme suggestions from the SuggestKeywordThemes "
            . "method.%s",
            $response->getKeywordThemes()->count(),
            PHP_EOL
        );
        return iterator_to_array($response->getKeywordThemes()->getIterator());
    }
    // [END add_smart_campaign_11]

    /**
     * Retrieves KeywordThemeConstants that are derived from autocomplete data for the given keyword
     * text.
     *
     * These KeywordThemeConstants are derived from autocomplete data for the
     * given keyword text. They are mapped to KeywordThemes before being returned.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $keywordText a keyword text used for generating keyword themes
     * @return KeywordTheme[] a list of KeywordThemes
     */
    // [START add_smart_campaign]
    private static function getKeywordTextAutoCompletions(
        GoogleAdsClient $googleAdsClient,
        string $keywordText
    ): array {
        $keywordThemeConstantService = $googleAdsClient->getKeywordThemeConstantServiceClient();

        // Issues a request to retrieve the keyword theme constants.
        $response = $keywordThemeConstantService->suggestKeywordThemeConstants(
            (new SuggestKeywordThemeConstantsRequest())
                ->setQueryText($keywordText)
                ->setCountryCode(self::COUNTRY_CODE)
                ->setLanguageCode(self::LANGUAGE_CODE)
        );

        printf(
            "Retrieved %d keyword theme constants using the keyword: '%s'.%s",
            $response->getKeywordThemeConstants()->count(),
            $keywordText,
            PHP_EOL
        );

        // Maps the keyword theme constants to KeywordTheme instances for consistency with the
        // response from SmartCampaignSuggestService.SuggestKeywordThemes.
        return array_map(function (KeywordThemeConstant $keywordThemeConstant) {
            return new KeywordTheme([
                'keyword_theme_constant' => $keywordThemeConstant
            ]);
        }, iterator_to_array($response->getKeywordThemeConstants()->getIterator()));
    }
    // [END add_smart_campaign]

    /**
     * Builds a SmartCampaignSuggestionInfo object with business details.
     *
     * The details are used by the SmartCampaignSuggestService to suggest a budget amount as well
     * as creatives for the ad.
     *
     * Note that when retrieving ad creative suggestions it's required that the "final_url",
     * "language_code" and "keyword_themes" fields are set on the SmartCampaignSuggestionInfo
     * instance.
     *
     * @param string|null $businessProfileLocationResourceName the resource name of a Business
     *     Profile location
     * @param string|null $businessName the name of a Business Profile
     * @return SmartCampaignSuggestionInfo a SmartCampaignSuggestionInfo instance
     */
    // [START add_smart_campaign_9]
    private static function getSmartCampaignSuggestionInfo(
        ?string $businessProfileLocationResourceName,
        ?string $businessName
    ): SmartCampaignSuggestionInfo {
        $suggestionInfo = new SmartCampaignSuggestionInfo([
            // Adds the URL of the campaign's landing page.
            'final_url' => self::LANDING_PAGE_URL,

            // Adds the language code for the campaign.
            'language_code' => self::LANGUAGE_CODE,

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
        ]);

        // Sets either of the business_profile_location or business_name, depending on whichever is
        // provided.
        if ($businessProfileLocationResourceName) {
            $suggestionInfo->setBusinessProfileLocation($businessProfileLocationResourceName);
        } else {
            $suggestionInfo->setBusinessContext(new BusinessContext([
                'business_name' => $businessName
            ]));
        }
        return $suggestionInfo;
    }
    // [END add_smart_campaign_9]

    /**
     * Retrieves a suggested budget amount for a new budget.
     *
     * Using the SmartCampaignSuggestService to determine a daily budget for new and existing
     * Smart campaigns is highly recommended because it helps the campaigns achieve optimal
     * performance.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param SmartCampaignSuggestionInfo $suggestionInfo a SmartCampaignSuggestionInfo instance
     *      with details about the business being advertised
     * @return int a daily budget amount in micros
     */
    // [START add_smart_campaign_1]
    private static function getBudgetSuggestion(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        SmartCampaignSuggestionInfo $suggestionInfo
    ): int {



        // Issues a request to retrieve a budget suggestion.
        $smartCampaignSuggestService = $googleAdsClient->getSmartCampaignSuggestServiceClient();
        $response = $smartCampaignSuggestService->suggestSmartCampaignBudgetOptions(
            (new SuggestSmartCampaignBudgetOptionsRequest())
                ->setCustomerId($customerId)
                // You can retrieve suggestions for an existing campaign by setting the "campaign"
                // field equal to the resource name of a campaign:
                // ->setCampaign('INSERT_CAMPAIGN_RESOURCE_NAME_HERE');
                // Since these suggestions are for a new campaign, we're going to use the
                // suggestion_info field instead.
                ->setSuggestionInfo($suggestionInfo)
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
     * Retrieves creative suggestions for a Smart campaign ad.
     *
     * Using the SmartCampaignSuggestService to suggest creatives for new and existing Smart
     * campaigns is highly recommended because it helps the campaigns achieve optimal performance.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param SmartCampaignSuggestionInfo $suggestionInfo a SmartCampaignSuggestionInfo instance
     *      with details about the business being advertised
     * @return SmartCampaignAdInfo|null a SmartCampaignAdInfo instance with suggested headlines and
     *      descriptions
     */
    // [START add_smart_campaign_10]
    private static function getAdSuggestions(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        SmartCampaignSuggestionInfo $suggestionInfo
    ) {
        // Unlike the SuggestSmartCampaignBudgetOptions method, it's only possible to use
        // suggestion_info to retrieve ad creative suggestions.

        // Issues a request to retrieve ad creative suggestions.
        $smartCampaignSuggestService = $googleAdsClient->getSmartCampaignSuggestServiceClient();
        $response = $smartCampaignSuggestService->suggestSmartCampaignAd(
            (new SuggestSmartCampaignAdRequest())
                ->setCustomerId($customerId)
                ->setSuggestionInfo($suggestionInfo)
        );

        // The SmartCampaignAdInfo object in the response contains a list of up to three headlines
        // and two descriptions. Note that some of the suggestions may have empty strings as text.
        // Before setting these on the ad you should review them and filter out any empty values.
        $adSuggestions = $response->getAdInfo();
        if (is_null($adSuggestions)) {
            return null;
        }
        print 'The following headlines were suggested:' . PHP_EOL;
        foreach ($adSuggestions->getHeadlines() as $headline) {
            print "\t" . ($headline->getText() ?: 'None') . PHP_EOL;
        }
        print 'And the following descriptions were suggested:' . PHP_EOL;
        foreach ($adSuggestions->getDescriptions() as $description) {
            print "\t" . ($description->getText() ?: 'None') . PHP_EOL;
        }
        return $adSuggestions;
    }
    // [END add_smart_campaign_10]

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
     * @param string|null $businessProfileLocationResourceName the resource name of a Business
     *     Profile location
     * @param string|null $businessName the name of a Business Profile
     * @return MutateOperation a MutateOperation that creates a SmartCampaignSetting
     */
    // [START add_smart_campaign_4]
    private static function createSmartCampaignSettingOperation(
        int $customerId,
        ?string $businessProfileLocationResourceName,
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

        // It's required that either a business profile location resource name or a business name is
        // added to the SmartCampaignSetting.
        if ($businessProfileLocationResourceName) {
            $smartCampaignSetting->setBusinessProfileLocation($businessProfileLocationResourceName);
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
     * @param SmartCampaignSuggestionInfo $smartCampaignSuggestionInfo a SmartCampaignSuggestionInfo
     *     instance
     * @return MutateOperation[] a list of MutateOperations that create new campaign criteria
     */
    // [START add_smart_campaign_8]
    private static function createCampaignCriterionOperations(
        int $customerId,
        array $keywordThemeInfos,
        SmartCampaignSuggestionInfo $smartCampaignSuggestionInfo
    ): array {
        $operations = [];
        foreach ($keywordThemeInfos as $info) {
            // Creates the campaign criterion object.
            $campaignCriterion = new CampaignCriterion([
                // Sets the campaign ID to a temporary ID.
                'campaign' =>
                    ResourceNames::forCampaign($customerId, self::SMART_CAMPAIGN_TEMPORARY_ID),
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

        // Create a location criterion for each location in the suggestion info object to add
        // corresponding location targeting to the Smart campaign.
        foreach ($smartCampaignSuggestionInfo->getLocationList()->getLocations() as $location) {
            // Creates the campaign criterion object.
            $campaignCriterion = new CampaignCriterion([
                // Sets the campaign ID to a temporary ID.
                'campaign' =>
                    ResourceNames::forCampaign($customerId, self::SMART_CAMPAIGN_TEMPORARY_ID),
                // Set the location to the given location.
                'location' => $location
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
     * @param SmartCampaignAdInfo|null $adSuggestions a SmartCampaignAdInfo object with ad creative
     *      suggestions
     * @return MutateOperation a MutateOperation that creates a new ad group ad
     */
    // [START add_smart_campaign_6]
    private static function createAdGroupAdOperation(
        int $customerId,
        ?SmartCampaignAdInfo $adSuggestions
    ): MutateOperation {
        if (is_null($adSuggestions)) {
            $smartCampaignAdInfo = new SmartCampaignAdInfo();
        } else {
            // The SmartCampaignAdInfo object includes headlines and descriptions retrieved
            // from the SmartCampaignSuggestService::SuggestSmartCampaignAd method. It's
            // recommended that users review and approve or update these creatives before
            // they're set on the ad. It's possible that some or all of these assets may
            // contain empty texts, which should not be set on the ad and instead should be
            // replaced with meaningful texts from the user. Below we just accept the creatives
            // that were suggested while filtering out empty assets, but individual workflows
            // will vary here.
            $smartCampaignAdInfo = new SmartCampaignAdInfo([
                'headlines' => array_filter(
                    iterator_to_array($adSuggestions->getHeadlines()->getIterator()),
                    function ($value) {
                        return $value->getText();
                    }
                ),
                'descriptions' => array_filter(
                    iterator_to_array($adSuggestions->getDescriptions()->getIterator()),
                    function ($value) {
                        return $value->getText();
                    }
                )
            ]);
        }
        // Creates the ad group ad object.
        $adGroupAd = new AdGroupAd([
            // Sets the ad group ID to a temporary ID.
            'ad_group' => ResourceNames::forAdGroup($customerId, self::AD_GROUP_TEMPORARY_ID),
            'ad' => new Ad([
                // Sets the type to SMART_CAMPAIGN_AD.
                'type' => AdType::SMART_CAMPAIGN_AD,
                'smart_campaign_ad' => $smartCampaignAdInfo
            ])
        ]);

        // The SmartCampaignAdInfo object includes headlines and descriptions retrieved from the
        // SmartCampaignSuggestService.SuggestSmartCampaignAd method. It's recommended that users
        // review and approve or update these ads before they're set on the ad. It's possible that
        // some or all of these assets may contain empty texts, which should not be set on the ad
        // and instead should be replaced with meaningful texts from the user.
        // Below we just accept the ads that were suggested while filtering out empty assets.
        // If no headlines or descriptions were suggested, then we manually add some, otherwise
        // this operation will generate an INVALID_ARGUMENT error. Individual workflows will likely
        // vary here.
        $currentHeadlinesCount = $smartCampaignAdInfo->getHeadlines()->count();
        for ($i = 0; $i < self::NUM_REQUIRED_HEADLINES - $currentHeadlinesCount; $i++) {
            $smartCampaignAdInfo->setHeadlines(
                array_merge(
                    iterator_to_array($smartCampaignAdInfo->getHeadlines()),
                    [new AdTextAsset(['text' => 'Placeholder headline ' . $i])]
                )
            );
        }
        $currentDescriptionsCount = $smartCampaignAdInfo->getDescriptions()->count();
        for ($i = 0; $i < self::NUM_REQUIRED_DESCRIPTIONS - $currentDescriptionsCount; $i++) {
            $smartCampaignAdInfo->setDescriptions(
                array_merge(
                    iterator_to_array($smartCampaignAdInfo->getDescriptions()),
                    [new AdTextAsset(['text' => 'Placeholder description ' . $i])]
                )
            );
        }

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
            } elseif ($result->hasCampaignResult()) {
                $resourceType = "Campaign";
                $resourceName = $result->getCampaignResult()->getResourceName();
            } elseif ($result->hasSmartCampaignSettingResult()) {
                $resourceType = "SmartCampaignSetting";
                $resourceName = $result->getSmartCampaignSettingResult()->getResourceName();
            } elseif ($result->getAdGroupResult()) {
                $resourceType = "AdGroup";
                $resourceName = $result->getAdGroupResult()->getResourceName();
            } elseif ($result->getAdGroupAdResult()) {
                $resourceType = "AdGroupAd";
                $resourceName = $result->getAdGroupAdResult()->getResourceName();
            } elseif ($result->getCampaignCriterionResult()) {
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

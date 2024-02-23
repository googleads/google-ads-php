## 22.1.0
*   Added support for v16 of Google Ads API.
*   Fixed dependabot alert in `examples/LaravelSampleApp/composer.lock`.
*   Renamed `examples/Extensions` to `examples/Assets`. Removed some logic
    related to the extensions.
*   Renamed code examples:
    * from AddLeadFormExtension to AddLeadFormAsset
    * from AddSitelinksUsingAssets to AddSitelinks
*   Updated code examples:
    * AddConversionAction
    * AddFlexibleRuleUserList
    * GetAdGroupBidModifiers
*   Removed code examples:
    * AddAffiliateLocationExtensions
    * AddBusinessProfileLocationExtensions
    * AddGeoTarget
    * AddImageExtension
    * AddSitelinks (the old one that uses extensions)
    * MigratePromotionFeedToAsset
    * RemoveEntireSitelinkCampaignExtensionSetting
    * UpdateSitelink
    * UpdateSitelinkCampaignExtensionSetting

## 22.0.0
*   Removed support for v13 of Google Ads API.
*   Added more methods to `ResourceNames` of v14 and v15.
*   Updated `GoogleAdsFailuresInterceptorTest.php` and `GoogleAdsLoggingInterceptorTest` to make them work with the latest version of `google/gax`.
*   Updated code examples:
    * AddFlexibleRuleUserList
    * AddShoppingProductAd
    * UploadOfflineConversion

## 21.1.0
*   Added support for v15 of Google Ads API. The following code examples still use v14 because the services in the examples were removed in v15:
    * ApproveMerchantCenterLink
    * RejectMerchantCenterLink
    * UploadImage
    * UploadMediaBundle
*   The GAPIC v2 service clients (`src/Google/Ads/GoogleAds/v15/Services/Client/<SERVICE_NAME>Client.php`) no longer rely on base classes (`src/Google/Ads/GoogleAds/v15/Services/Client/BaseClient/<SERVICE_NAME>BaseClient.php`). All functions and variables are now directly included in the service classes.
*   Added support for `useCloudOrgForApiAccess` config. This is in preparation for the pilot that uses Google Cloud orgs for API Access levels.
*   Updated
    [`InfoRedactor`](https://github.com/googleads/google-ads-php/blob/main/src/Google/Ads/GoogleAds/Lib/V15/InfoRedactor.php) to redact fields of Local Services lead and Local Services lead
conversation.
*   Updated code examples:
    * AddBillingSetup
    * AddPerformanceMaxProductListingGroupTree
    * AddCustomerMatchUserList
    * UploadCallConversion
    * UploadOfflineConversion
    * UploadStoreSalesTransactions
*   Renamed and updated code examples:
    * UploadConversionWithIdentifiers to UploadEnhancedConversionsForLeads
    * UploadConversionEnhancement to UploadEnhancedConversionsForWeb
*   Fixed the following Shopping examples after the `ShoppingSetting::sales_country` field is
    removed:
    * AddMerchantCenterDynamicRemarketingCampaign
    * AddPerformanceMaxRetailCampaign
    * AddShoppingProductAd

## 21.0.1
*   Fixed #946 by adding `forTopicConstant()` to
    [ResourceNames](https://github.com/googleads/google-ads-php/blob/main/src/Google/Ads/GoogleAds/Util/V14/ResourceNames.php).

## 21.0.0
*   Removed support for v12 of Google Ads API.
*   Use [the GAPIC v2 source
    code](https://developers.google.com/google-ads/api/docs/client-libs/php/gapic)
    in `ResourceNames` and `ServiceClientFactoryTrait` of v14.
*   Updated the source code to use PHP 8 features, e.g., named arguments,
    private constants, constructor promotion, removing unused exception variables.
*   Updated code examples:
    * AddCampaigns
    * GenerateKeywordIdeas
*   Removed trivial code examples that can be easily obtained by changing small
    parts of other code examples.

## 20.1.0
*   Added support for v14_1 of Google Ads API.
*   Removed the `final` modifier from `GoogleAdsClient`. This fixes
    https://github.com/googleads/google-ads-php/issues/347.
*   Fixed https://github.com/googleads/google-ads-php/issues/902 by passing
    `linked-customer-id` to the header of a request.
*   Made `GoogleAdsCallLogger::getNextFinerLogLevel` aligned with PSR-3
    `LogLevel` enum by returning a lowercase string. This fixes
    https://github.com/googleads/google-ads-php/issues/849.
*   Fixed the issue of the check for grpc versions in
    `GoogleAdsClientBuilder::validate()`. It now supports the case when
    the system-package version is not found.
*   Added support for [the GAPIC v2 source
    code](https://developers.google.com/google-ads/api/docs/client-libs/php/gapic).
    * Added support for the `useGapicV2Source` configuration.
    * Updated all code examples to show how to use the GAPIC v2 source code.
*   Added code examples:
    * GenerateForecastMetrics (new version that uses `KeywordPlanIdeaService`)
    * GenerateHistoricalMetrics (new version that uses `KeywordPlanIdeaService`)
*   Removed AddKeywordPlan example.

## 20.0.0
*   Updated `composer.json` to require the minimum PHP version of 8.0. See also
    [README](README.md) for more details.
*   Updated the minimum required version of `google/gax` to 1.19.1.
*   Added a check for the versions of grpc installed by Composer and installed
    as a platform package to `GoogleAdsClientBuilder::validate()`. This is a fix for
    [#406](https://github.com/googleads/google-ads-php/issues/406).
*   Fixed dependabot alert in `examples/LaravelSampleApp/composer.lock`.

## 19.2.0
*   Added support for v14 of Google Ads API.
*   Updated AddPerformanceMaxForTravelGoalsCampaign example.
*   Removed code examples:
    * GenerateForecastMetrics
    * GenerateHistoricalMetrics
    * GetCampaignCriterionBidModifierSimulations

## 19.1.0
*   Added support for v13_1 of Google Ads API.
*   Renamed the HotelAds example directory to Travel.
*   Added AddThingsToDoAd example.
*   Updated AddPerformanceMaxForTravelGoalsCampaign example.

## 19.0.0
*   Removed support for v11 of Google Ads API.
*   Updated CreateExperiment example.

## 18.0.0
*   Added support for v13 of Google Ads API.
*   Removed support for v10 of Google Ads API.
*   Updated code examples:
    * AddCustomerMatchUserList
    * AddPerformanceMaxRetailCampaign
    * GetAdGroupBidModifiers
    * GetChangeDetails
*   Reworked code examples to address the deprecation of combined rule user lists
    and expression rule user lists:
    * Edited SetUpAdvancedRemarketing and SetUpRemarketing
    * Renamed AddCombinedRuleUserList to AddFlexibleRuleUserList
    * Removed AddExpressionRuleUserList

## 17.1.0
*   Added support for v12 of Google Ads API.
*   Renamed HandleExpandedTextAdPolicyViolations to HandleResponsiveSearchAdPolicyViolations
    and made it work with responsive search ads instead.
*   Removed code examples:
    * All examples in the Migration/ directory
        * Moved CampaignReportToCsv to the Misc/ directory
    * AddDynamicPageFeed
    * AddLocalCampaign
    * AddSmartDisplayAd
    * AddShoppingSmartAd
*   Updated code examples:
    * AddPerformanceMaxRetailCampaign
    * AddSmartCampaign
    * CreateExperiment
    * ForecastReach

## 17.0.0
*   Added support for v11_1 of Google Ads API.
*   Updated the FieldMasks utility to better handle empty message fields. For
    more details on how field masks work, visit
    https://developers.google.com/google-ads/api/docs/client-libs/php/fieldmasks.
*   Updated the minimum required version of `google/protobuf` to 3.21.5.
*   Added a code example: GenerateHistoricalMetrics
*   Reworked code examples to address the deprecation of Expanded Text Ads (ETA):
    * Edited AddAdCustomizer
    * Renamed UpdateExpandedTextAd to UpdateResponsiveSearchAd
    * Renamed ValidateTextAd to ValidateAd
    * Removed AddExpandedTextAds
    * Removed AddExpandedTextAdWithUpgradedUrls

## 16.0.0
*   Removed support for v9 of Google Ads API.
*   Cleaned up the FieldMasks util to remove reference to protocol buffer's wrapper types.
*   Added support for Monolog 1 back.
*   Updated the minimum required version of `google/gax` to 1.13.0.
*   Renamed a code example GetArtifactMetadata to SearchForGoogleAdsFields.
*   Updated code examples:
    * GenerateUserCredentials
    * SetCustomClientTimeouts
*   Fixed dependabot alert in `examples/LaravelSampleApp/composer.lock`.

## 15.1.0
*   Added support for v11 of Google Ads API.
*   Added support for version 3 of [`monolog/monolog`](https://github.com/Seldaek/monolog).
*   Fixed dependabot alert in `examples/LaravelSampleApp/composer.lock`.
*   Added code examples:
    * CreateExperiment
    * DetectAndApplyRecommendations
*   Removed code examples:
    * CreateCampaignExperiment
    * GraduateCampaignExperiment
*   Updated code examples:
    * AddSmartCampaign
    * GenerateUserCredentials

## 15.0.0
*   Added support for v10_1 of Google Ads API.
*   Removed support for v8 of Google Ads API.
*   Combined two examples in `Authentication/` into `GenerateUserCredentials`,
    since [OAuth OOB](https://developers.googleblog.com/2022/02/making-oauth-flows-safer.html?m=1#disallowed-oob) is being deprecated.
*   Updated `Dockerfile` to use the latest stable version of Apache PHP by default.
*   Updated `examples/Migration/composer.json` and fixed
    [#761](https://github.com/googleads/google-ads-php/issues/761).
*   Fixed dependabot alert in `examples/LaravelSampleApp/composer.lock`.
*   Added code examples:
    * AddPerformanceMaxProductListingGroupTree
*   Updated code examples:
    * AddCampaigns
    * AddCustomerMatchUserList
    * AddDynamicRemarketingAsset
    * AddPerformanceMaxCampaign
    * AddPerformanceMaxRetailCampaign
    * GetChangeDetails
    * NavigateSearchResultPagesCachingTokens
    * UploadOfflineConversion

## 14.0.0
*   Added support for v10 of Google Ads API.
*   Removed support for v7 of Google Ads API.
*   Added support for case-insensitive HTTP header field names in `GoogleAdsMetadataTrait` of all
    versions.
*   Updated `composer.json` and `composer.lock` of LaravelSampleApp.
*   Updated the minimum required version of `google/protobuf` to 3.19.4.
*   Added code examples:
    * AddCall
    * AddCallAd
    * AddDynamicPageFeedAsset
    * AddDynamicRemarketingAsset
    * NavigateSearchResultPagesCachingTokens
*   Updated code examples:
    * AddDisplayUploadAd
    * AddPerformanceMaxCampaign
    * AddPerformanceMaxRetailCampaign
    * GetAccountInformation
    * GetKeywords
    * UploadConversionWithIdentifiers
    * UploadImageAsset

## 13.0.0
*   Updated `composer.json` to require the minimum PHP version of 7.4.
*   Added support for setting gRPC channel, gRPC interceptor and middleware.
*   Updated the references of "Google My Business/GMB" in code examples to
    "Business Profile".
*   Updated LaravelSampleApp to use lazy loading for the paging mechanism for
    lower memory footprint and page loading time.
*   Added code examples:
    * AddPerformanceMaxCampaign
    * AddPerformanceMaxRetailCampaign
    * AddResponsiveSearchAdWithAdCustomizer
    * UploadConversionWithIdentifiers
    * UploadConversionEnhancement
*   Updated code example:
    * AddAppCampaign
*   Renamed code examples:
    * AddGoogleMyBusinessLocationExtensions to AddBusinessProfileLocationExtensions
    * SetupAdvancedRemarketing to SetUpAdvancedRemarketing
    * SetupRemarketing to SetUpRemarketing

## 12.1.0
*   Added support for v9 of Google Ads API.
*   Added `grpc` and `protobuf` extensions to `require-dev` of `composer.json`.
*   Added support for conversion adjustments in `GoogleAdsError`.
*   Updated `composer.json` of LaravelSampleApp.
*   Migrated the following extension examples to use assets.
    * AddSitelinksUsingFeed (renamed to AddSitelinksUsingAssets)
    * AddHotelCallout
    * AddPrices
*   Updated the AddSmartCampaign example to use newly available methods and
    specifications in v9.
*   Updated UploadStoreSalesTransactions to support the `enableWarnings` mode of
    `OfflineUserDataJobService`. See
    the [Warnings](https://developers.google.com/google-ads/api/docs/best-practices/warnings)
    guide for details.

## 12.0.0
*   Added support for sending the library name and version with each request.
*   Updated the minimum required version of `google/protobuf` to 3.18.0.
*   Updated `composer.json` and `composer.lock` of LaravelSampleApp.
*   Added code examples:
    * AddBiddingDataExclusion
    * AddBiddingSeasonalityAdjustment
*   Fixed code examples:
    * AddDisplayUploadAd
    * AddLocalCampaign
    * AddMerchantCenterDynamicRemarketingCampaign
    * AddSmartDisplayAd
    * UploadImage
    * UploadImageAsset
    * UploadMediaBundle

## 11.0.0
*   Added support for v8_1 of Google Ads API.
*   Added 1.26 to the minimum required version constraints of the `monolog/monolog` dependency.
*   Removed support for v6 of Google Ads API.
*   Improved the FieldMasks utility:
    * Support getting enum value names from fields in the getFieldValue method.
    * Support the case when a modified field is an empty Message with no fields declared in the
      compare method.
*   Fixed/improved code examples:
    * GetAdGroupBidModifiers
    * AddSmartCampaign
    * GetChangeDetails
    * AddLocalCampaign
*   Removed the code example AddGmailAd.

## 10.1.0
*   Moved the CampaignReportToCsv example to the Migration/ directory.
*   Added the LIMIT clause to the query of the GetAdGroupBidModifiers example.

## 10.0.0
*   Added support for v8 of Google Ads API.
*   Removed support for v5 of Google Ads API.
*   Fixed the ResourceNames utility:
    * Some method names are changed to be consistent with others:
        * forAccountLinkName becomes forAccountLink
        * forThirdPartyAppAnalyticsLinkName becomes forThirdPartyAppAnalyticsLink
    * Enumerable names are now expected instead of indexes. The affected methods are:
        * forAdGroupExtensionSetting (ExtensionType)
        * forCampaignAsset (AssetFieldType)
        * forCampaignExtensionSetting (ExtensionType)
        * forCustomerExtensionSetting (ExtensionType)
    * All parameters typed as integers are now typed as strings
*   Added support for removing unused Google Ads API versions. See [this guide](
    https://developers.google.com/google-ads/api/docs/client-libs/php/performance#unused_versions)
    for details.
*   Updated the minimum required versions of `google/protobuf` to 3.17.1.
*   Added code examples:
    * AddSmartCampaign
    * UseCrossAccountBiddingStrategy
*   Fixed/improved code examples:
    * RemoveEntireSitelinkCampaignExtensionSetting
    * UpdateSitelinkCampaignExtensionSetting
    * UploadStoreSalesTransactions

## 9.0.0
*   Added support for v7 of Google Ads API.
*   Removed support for v4 of Google Ads API.
*   Added code examples:
    * AddCustomAudience
    * CampaignReportToCsv
    * MigratePromotionFeedToAsset
*   Fixed/improved code examples:
    * GetAdGroupBidModifiers
    * LaravelSampleApp
    * UploadCallConversion
    * UploadOfflineConversion

## 8.1.0
*   Added missing 'null' type hints in the package `src/Google/Ads/GoogleAds/v6/`.
*   Updated code examples:
    * AddCampaignTargetingCriteria
    * AddDynamicPageFeed
    * AddSitelinks
    * CreateCustomer
    * GetGeoTargetConstantsByNames
    * UploadStoreSalesTransactions

## 8.0.0
*   Added support for PHP 8.0.
*   Updated the minimum required versions of `google/gax`, `grpc/grpc` and
    `google/protobuf`.
    * Updated GoogleAdsLoggingInterceptor.php of all versions to accommodate a
      breaking change in the new version of `grpc/grpc` (1.36.0).
    * Updated GoogleAdsFailuresUnaryCall.php of all versions.
*   Makes the `examples` directory and its dependency belong to `dev` in
    `composer.json`. This makes the size of the downloaded source code lighter.
*   Refactored ResourceNames.php and ServiceClientFactoryTrait.php.
*   Fixed code examples:
    * GetAdGroupBidModifier
    * ValidateTextAd

## 7.0.0
*   Added support for v6_1 of Google Ads API.
*   Removed support for v3 of Google Ads API.
*   Updated `composer.json` to require the minimum PHP version of 7.3.
*   Fixed the FieldMasks utility to make it work with null nested messages.
*   Redact email address in the newly available CustomerUserAccessInvitation.
*   Added code examples:
    * AddImageExtension
    * GetPendingInvitations
    * InviteUserWithAccessRole
*   Fixed/improved code examples:
    * AddCampaignBidModifier
    * GetChangeDetails
    * GetProductBiddingCategoryConstant

## 6.1.0
*   Added support for logging responses of stream calls.
*   Updated the required protobuf version to v3.14.0 for better performance and bug
    fixes.
*   Moved testing files to `tests/` and updated the PSR-4 rules in
    `composer.json` accordingly.
*   Added support for PHPUnit 9.3.
*   Added print_php_information for printing information about installed extensions.
*   Added code examples:
    * GetInvoices
    * SetupRemarketing
    * SetupAdvancedRemarketing

## 6.0.0
*   Added support for v6 of Google Ads API.
*   Updated all code examples to v6.
*   Removed support for v2.
*   Refactored LogMessageFormatter to redact any email addresses present in the requests and
    responses.
*   Added support of client configuration from environment variables.
*   Added code examples:
    * UpdateAudienceTargetRestriction
    * AddLocalCampaign
    * SetCustomClientTimeouts
    * GetChangeDetails
    * CreateFeedItemSet
    * GetFeedItemsOfFeedItemSet
    * LinkFeedItemSet
    * AddLeadFormExtension
*   Renamed the code examples:
    * From GetAccountChanges to GetChangeSummary
    * From AuthenticateInStandaloneApplication to AuthenticateInDesktopApplication
*   Migrated to [field presence](https://github.com/protocolbuffers/protobuf/blob/master/docs/field_presence.md).
    * Migrated the code examples.
    * Added unit tests.

## 5.0.0
*   Added support for v5 of Google Ads API.
*   Upgraded dependencies: `google/protobuf` (^3.13.0), `ulrichsg/getopt-php` (^3.4).
*   Fixed instantiation tests and PSR-4 issues.
*   Updated all code examples to v5.
*   Added code examples:
    * AddLogicalUserList
    * AddCombinedRuleUserList
    * AddExpressionRuleUserList
    * AddConversionBasedUserList
    * AddBillingSetup
    * RejectMerchantCenterLink
*   Fixed/improved code examples:
    * AddSmartDisplayAd
    * UpdateSitelinkCampaignExtensionSetting
    * CreateCustomer
    * UsePortfolioBiddingStrategy
    * ForecastReach

## 4.0.0
*   Added support for v4 of Google Ads API.
*   Updated code examples to v4.
*   Removed support for v1.
*   Regenerated source for v2 and v3 to reflect a new design.
    The following methods now have different signatures:
    * `ConversionUploadServiceClient::uploadClickConversions()`
    * `ConversionUploadServiceClient::uploadCallConversions()`
    * `ConversionAdjustmentUploadServiceClient::uploadConversionAdjustment()`
    * `GeoTargetConstantServiceClient::suggestGeoTargetConstants()`
    * `KeywordPlanIdeaServiceClient::generateKeywordIdeas()`
    * `MutateJobServiceClient::addMutateJobOperations()`
    * `ReachPlanServiceClient::generateProductMixIdeas()`
    * `ReachPlanServiceClient::generateReachForecast()`
*   Added support for the `linked-customer-id` header for v4.
*   Added more tests to increase code coverage.
*   Fixed some test data.
*   Renamed `AddCompleteCampaignsUsingMutateJob` to
    `AddCompleteCampaignsUsingBatchJob` to reflect a new name in v4.
*   Added code examples:
    * AddDisplayUploadAd
    * AddSitelinksUsingFeeds
*   Fixed/improved code examples:
    * AddDynamicPageFeed
    * GenerateKeywordIdeas
    * HandleExpandedTextAdPolicyViolations
    * HandleKeywordPolicyViolations
    * RemoveFlightsFeedItemAttributeValue
    * UpdateAdGroup
    * UpdateFlightsFeedItemStringAttributeValue
    * UsePortfolioBiddingStrategy

## 3.2.0
*   Added support for v3_1 of Google Ads API.
*   Fixed the field masks to work properly with repeated fields in a message.
*   Extended `GoogleAdsService.searchStream` with an experimental iterator.
*   Refreshed `ResourceNames` with some types: `CurrencyConstant`, `Ad`, `AdGroupExtensionSetting`,
    `CustomerExtensionSetting`, `CampaignExtensionSetting`.
*   Added code examples
    * AddResponsiveSearchAd
    * GetResponsiveSearchAds
    * AddHotelCallout
    * UpdateExpandedTextAd
    * UpdateSitelink
    * UpdateSitelinkCampaignExtensionSetting
    * AddMerchantCenterDynamicRemarketingCampaign
    * ForecastReach
    * AddGeoTarget
    * RemoveEntireSitelinkCampaignExtensionSetting
    * GetAdGroupCriterionCpcBidSimulations
    * UploadCallConversion
    * ApproveMerchantCenterLink
    * SearchForLanguageAndCarrierConstants
    * GetCampaignCriterionBidModifierSimulations
    * AddCustomerMatchUserList
*   Improved code examples
    * GetAccountHierarchy
    * AddCompleteCampaignsUsingMutateJob
    * GetAccountBudgets

## 3.1.0
*   Added support for v3_0 of Google Ads API.
*   Added support for conversion-typed API errors.
*   Added code examples: AddSiteLinks, UploadMediaBundle, UploadImageAsset,
    UploadConversionAdjustment, ValidateTextAd, AddPrices, AddListingScope,
    UpdateCampaignCriterionBidModifier, AddAppCampaign.
*   Fixed code examples: AddDynamicPageFeed.
*   Improved code examples: UploadOfflineConversion, GetArtifactMetadata, AddRemarketingAction.
*   Upgraded the Coding Style from PSR-2 to PSR-12 and made the code compliant.
*   Upgraded dependencies: `squizlabs/php_codesniffer` (^3.5), `google/protobuf` (^3.11.4).

## 3.0.0
*   Removed support of PHP 7.1.
*   Remove the preemptive initialization of "GoogleAdsFailures" when not running with gRPC
    transport.
*   Added code examples: RemoveFlightsFeedItemStringAttributeValue,
    UpdateFlightsFeedItemStringAttributeValue, RemoveFeedItems, HandleRateExceededError,
    GetProductBiddingCategoryConstant, AddDemographicTargetingCriteria, AddRemarketingAction and
    UploadOfflineConversion.
*   Fixed code examples: AddHotelAd and GetAccountHierarchy.

## 2.2.0
*   Added support for v2_2 of Google Ads API.
*   Added examples for feeds (ad customizer, real estate, flights, Google My Business), negative
    criteria, image assets and account hierarchy.
*   Enhanced error management of mutate operations.
*   Added support for monolog 2.0.

## 2.1.0
*   Added support for v2_1 of Google Ads API.
*   Switched the default implementation of protobuf to use the C extension and added related
    documentation.
*   Added examples for Google My Business location extensions, Smart display ads and campaign
    experiments.

## 2.0.0
*   Added support for v2 of Google Ads API.
*   Renamed the getter and setter functions for unwrapped values from getXXXValue/setXXXValue to
    getXXXUnwrapped/setXXXUnwrapped to prevent them from clashing with other field names.
*   Added a test to instantiate all classes in the codebase to make sure there are no syntax errors.
*   Upgraded dependencies.

## 1.4.1
*   Fixed logging level configuration ([#120](https://github.com/googleads/google-ads-php/pull/120)).
*   Set max response message and metadata size ([#127](https://github.com/googleads/google-ads-php/pull/127)).

## 1.4.0
*   Added support for more resources in `ResourceNames`.
*   Added examples for Smart Shopping campaigns, batch processing using
    MutateJobService, and campaign draft.
*   Increased default deadline to 1 hour and added retry support for
    GoogleAdsService.search().

## 1.3.0
*   Added support for v1_3 of Google Ads API.
*   Added examples for ad parameters, campaign labels and media upload and retrieval.

## 1.2.0

*   Added support for v1_2 of Google Ads API.
*   Added utility functions to convert enum names to integer values and vice versa.
*   Added convenience functions for automatic unboxing of protobuf values, e.g. `getNameValue` along
    with the existing `getName`.
*   Added an example on campaign management migration from the legacy AdWords API.

## 1.1.0

*   Added support for v1_1 of Google Ads API.
*   Upgraded PHPUnit dependency to v7.5.
*   Added support for partial failures and matching example.

## 1.0.0

*   Added support and examples for v1_0 of Google Ads API.
*   Updated some dependencies, e.g., google/gax 0.38.0 and ulrichsg/getopt-php 3.2.2.
*   Updated some examples to match the new API specifications, e.g., GetHotelAdsPerformance.
*   Fixed a bug that prevented the login-customer-id header from being sent.

## 0.7.0

*   Added support and examples for v0_7 of Google Ads API.
*   Updated some examples to match the new API specifications, e.g., ApplyRecommendation,
    DismissRecommendation, GetKeywordStats, AddCampaignBidModifier.
*   Added GetHotelAdsPerformance example.
*   Removed AddCampaignGroup example.

## 0.6.0

*   Added support and examples for v0_6 of Google Ads API.
*   Added support for passing log-in customer ID with API requests.
*   Updated some examples to match the new API specifications, e.g.,
    ApplyRecommendations.php, GetGeoTargetConstantByNames.php.
*   Updated AddCampaignTargetingCriteria example to show how to include
    proximity targeting.

## 0.5.0

*   Added support and examples for v0_5 of Google Ads API.
*   Added campaign targeting criteria examples.
*   Added an account budget example.
*   Added Shopping campaign examples.
*   Added an account change example.

## 0.4.0

*   Added support and examples for v0_4 of Google Ads API.
*   Added account budget proposal and billing setup examples.
*   Added conversion action examples.
*   Added an example showing how to retrieve disapproved ads.

## 0.3.0

*   Added support and examples for V0_3 of Google Ads API.
*   Updated GetArtifactMetadata to quote the name param value.
*   Updated examples to initialize properties via constructors instead of
    setters.
*   Added examples showing how to add and get ad group bid modifiers.
*   Added an example showing how to create and attach shared keyword sets.
*   Added an example showing how to remove shared set criteria.
*   Updated hotel ad group bid modifier example with v0_3 criteria changes.
*   Added AddCampaignBidModifier example.

## 0.2.0

*   Added support for V0_2 of Google Ads API, which includes the Percent CPC
    bidding strategy.

## 0.1.0

*   Initial release with support for V0_1 of Google Ads API.

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

// Generated code ; DO NOT EDIT.

namespace Google\Ads\GoogleAds\Util\V8;

use Google\Ads\GoogleAds\V8\Services\AccessibleBiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V8\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V8\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V8\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdAssetViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\AdServiceClient;
use Google\Ads\GoogleAds\V8\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\AssetFieldTypeViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V8\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V8\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V8\Services\BiddingStrategySimulationServiceClient;
use Google\Ads\GoogleAds\V8\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V8\Services\CampaignSimulationServiceClient;
use Google\Ads\GoogleAds\V8\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V8\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\CombinedAudienceServiceClient;
use Google\Ads\GoogleAds\V8\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V8\Services\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V8\Services\CurrencyConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V8\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V8\Services\DetailedDemographicServiceClient;
use Google\Ads\GoogleAds\V8\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\DistanceViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V8\Services\DynamicSearchAdsSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedPlaceholderViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V8\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\GeographicViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V8\Services\GroupPlacementViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\HotelPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\IncomeRangeViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\KeywordViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V8\Services\LandingPageViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\LifeEventServiceClient;
use Google\Ads\GoogleAds\V8\Services\LocationViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V8\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\MobileAppCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\MobileDeviceConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V8\Services\OperatingSystemVersionConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\PaidOrganicSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\ProductBiddingCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V8\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V8\Services\SearchTermViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V8\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V8\Services\ShoppingPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\SmartCampaignSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V8\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V8\Services\TopicConstantServiceClient;
use Google\Ads\GoogleAds\V8\Services\TopicViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\UserInterestServiceClient;
use Google\Ads\GoogleAds\V8\Services\UserListServiceClient;
use Google\Ads\GoogleAds\V8\Services\UserLocationViewServiceClient;
use Google\Ads\GoogleAds\V8\Services\VideoServiceClient;
use Google\Ads\GoogleAds\V8\Services\WebpageViewServiceClient;
use Google\ApiCore\PathTemplate;

/**
 * Provides resource names for Google Ads API entities.
 */
final class ResourceNames
{

    /**
     * Generates a resource name of payments account type.
     *
     * @param string $customerId
     * @param string $paymentsAccountId
     * @return string the payments account resource name
     */
    public static function forPaymentsAccount(
        $customerId,
        $paymentsAccountId
    ): string {
        $pathTemplate = new PathTemplate(
            'customers/{customer}/paymentsAccounts/{payments_account}'
        );
        return $pathTemplate->render([
            'customer' => $customerId,
            'payments_account' => $paymentsAccountId,
        ]);
    }

    /**
     * Generates a resource name of accessible bidding strategy type.
     *
     * @param string $customerId
     * @param string $biddingStrategyId
     * @return string the accessible bidding strategy resource name
     */
    public static function forAccessibleBiddingStrategy(
        $customerId,
        $biddingStrategyId
    ): string {
        return AccessibleBiddingStrategyServiceClient::accessibleBiddingStrategyName(
            $customerId,
            $biddingStrategyId
        );
    }

    /**
     * Generates a resource name of account budget type.
     *
     * @param string $customerId
     * @param string $accountBudgetId
     * @return string the account budget resource name
     */
    public static function forAccountBudget(
        $customerId,
        $accountBudgetId
    ): string {
        return AccountBudgetServiceClient::accountBudgetName(
            $customerId,
            $accountBudgetId
        );
    }

    /**
     * Generates a resource name of account budget proposal type.
     *
     * @param string $customerId
     * @param string $accountBudgetProposalId
     * @return string the account budget proposal resource name
     */
    public static function forAccountBudgetProposal(
        $customerId,
        $accountBudgetProposalId
    ): string {
        return AccountBudgetProposalServiceClient::accountBudgetProposalName(
            $customerId,
            $accountBudgetProposalId
        );
    }

    /**
     * Generates a resource name of account link type.
     *
     * @param string $customerId
     * @param string $accountLinkId
     * @return string the account link resource name
     */
    public static function forAccountLink(
        $customerId,
        $accountLinkId
    ): string {
        return AccountLinkServiceClient::accountLinkName(
            $customerId,
            $accountLinkId
        );
    }

    /**
     * Generates a resource name of ad type.
     *
     * @param string $customerId
     * @param string $adId
     * @return string the ad resource name
     */
    public static function forAd(
        $customerId,
        $adId
    ): string {
        return AdServiceClient::adName(
            $customerId,
            $adId
        );
    }

    /**
     * Generates a resource name of ad group type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @return string the ad group resource name
     */
    public static function forAdGroup(
        $customerId,
        $adGroupId
    ): string {
        return AdGroupServiceClient::adGroupName(
            $customerId,
            $adGroupId
        );
    }

    /**
     * Generates a resource name of ad group ad type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $adId
     * @return string the ad group ad resource name
     */
    public static function forAdGroupAd(
        $customerId,
        $adGroupId,
        $adId
    ): string {
        return AdGroupAdServiceClient::adGroupAdName(
            $customerId,
            $adGroupId,
            $adId
        );
    }

    /**
     * Generates a resource name of ad group ad asset view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $adId
     * @param string $assetId
     * @param string $fieldType
     * @return string the ad group ad asset view resource name
     */
    public static function forAdGroupAdAssetView(
        $customerId,
        $adGroupId,
        $adId,
        $assetId,
        $fieldType
    ): string {
        return AdGroupAdAssetViewServiceClient::adGroupAdAssetViewName(
            $customerId,
            $adGroupId,
            $adId,
            $assetId,
            $fieldType
        );
    }

    /**
     * Generates a resource name of ad group ad label type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $adId
     * @param string $labelId
     * @return string the ad group ad label resource name
     */
    public static function forAdGroupAdLabel(
        $customerId,
        $adGroupId,
        $adId,
        $labelId
    ): string {
        return AdGroupAdLabelServiceClient::adGroupAdLabelName(
            $customerId,
            $adGroupId,
            $adId,
            $labelId
        );
    }

    /**
     * Generates a resource name of ad group asset type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $assetId
     * @param string $fieldType
     * @return string the ad group asset resource name
     */
    public static function forAdGroupAsset(
        $customerId,
        $adGroupId,
        $assetId,
        $fieldType
    ): string {
        return AdGroupAssetServiceClient::adGroupAssetName(
            $customerId,
            $adGroupId,
            $assetId,
            $fieldType
        );
    }

    /**
     * Generates a resource name of ad group audience view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the ad group audience view resource name
     */
    public static function forAdGroupAudienceView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return AdGroupAudienceViewServiceClient::adGroupAudienceViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of ad group bid modifier type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the ad group bid modifier resource name
     */
    public static function forAdGroupBidModifier(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return AdGroupBidModifierServiceClient::adGroupBidModifierName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of ad group criterion type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the ad group criterion resource name
     */
    public static function forAdGroupCriterion(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return AdGroupCriterionServiceClient::adGroupCriterionName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of ad group criterion label type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @param string $labelId
     * @return string the ad group criterion label resource name
     */
    public static function forAdGroupCriterionLabel(
        $customerId,
        $adGroupId,
        $criterionId,
        $labelId
    ): string {
        return AdGroupCriterionLabelServiceClient::adGroupCriterionLabelName(
            $customerId,
            $adGroupId,
            $criterionId,
            $labelId
        );
    }

    /**
     * Generates a resource name of ad group criterion simulation type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @param string $type
     * @param string $modificationMethod
     * @param string $startDate
     * @param string $endDate
     * @return string the ad group criterion simulation resource name
     */
    public static function forAdGroupCriterionSimulation(
        $customerId,
        $adGroupId,
        $criterionId,
        $type,
        $modificationMethod,
        $startDate,
        $endDate
    ): string {
        return AdGroupCriterionSimulationServiceClient::adGroupCriterionSimulationName(
            $customerId,
            $adGroupId,
            $criterionId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
    }

    /**
     * Generates a resource name of ad group extension setting type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $extensionType
     * @return string the ad group extension setting resource name
     */
    public static function forAdGroupExtensionSetting(
        $customerId,
        $adGroupId,
        $extensionType
    ): string {
        return AdGroupExtensionSettingServiceClient::adGroupExtensionSettingName(
            $customerId,
            $adGroupId,
            $extensionType
        );
    }

    /**
     * Generates a resource name of ad group feed type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $feedId
     * @return string the ad group feed resource name
     */
    public static function forAdGroupFeed(
        $customerId,
        $adGroupId,
        $feedId
    ): string {
        return AdGroupFeedServiceClient::adGroupFeedName(
            $customerId,
            $adGroupId,
            $feedId
        );
    }

    /**
     * Generates a resource name of ad group label type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $labelId
     * @return string the ad group label resource name
     */
    public static function forAdGroupLabel(
        $customerId,
        $adGroupId,
        $labelId
    ): string {
        return AdGroupLabelServiceClient::adGroupLabelName(
            $customerId,
            $adGroupId,
            $labelId
        );
    }

    /**
     * Generates a resource name of ad group simulation type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $type
     * @param string $modificationMethod
     * @param string $startDate
     * @param string $endDate
     * @return string the ad group simulation resource name
     */
    public static function forAdGroupSimulation(
        $customerId,
        $adGroupId,
        $type,
        $modificationMethod,
        $startDate,
        $endDate
    ): string {
        return AdGroupSimulationServiceClient::adGroupSimulationName(
            $customerId,
            $adGroupId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
    }

    /**
     * Generates a resource name of ad parameter type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @param string $parameterIndex
     * @return string the ad parameter resource name
     */
    public static function forAdParameter(
        $customerId,
        $adGroupId,
        $criterionId,
        $parameterIndex
    ): string {
        return AdParameterServiceClient::adParameterName(
            $customerId,
            $adGroupId,
            $criterionId,
            $parameterIndex
        );
    }

    /**
     * Generates a resource name of ad schedule view type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $criterionId
     * @return string the ad schedule view resource name
     */
    public static function forAdScheduleView(
        $customerId,
        $campaignId,
        $criterionId
    ): string {
        return AdScheduleViewServiceClient::adScheduleViewName(
            $customerId,
            $campaignId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of age range view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the age range view resource name
     */
    public static function forAgeRangeView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return AgeRangeViewServiceClient::ageRangeViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of asset type.
     *
     * @param string $customerId
     * @param string $assetId
     * @return string the asset resource name
     */
    public static function forAsset(
        $customerId,
        $assetId
    ): string {
        return AssetServiceClient::assetName(
            $customerId,
            $assetId
        );
    }

    /**
     * Generates a resource name of asset field type view type.
     *
     * @param string $customerId
     * @param string $fieldType
     * @return string the asset field type view resource name
     */
    public static function forAssetFieldTypeView(
        $customerId,
        $fieldType
    ): string {
        return AssetFieldTypeViewServiceClient::assetFieldTypeViewName(
            $customerId,
            $fieldType
        );
    }

    /**
     * Generates a resource name of batch job type.
     *
     * @param string $customerId
     * @param string $batchJobId
     * @return string the batch job resource name
     */
    public static function forBatchJob(
        $customerId,
        $batchJobId
    ): string {
        return BatchJobServiceClient::batchJobName(
            $customerId,
            $batchJobId
        );
    }

    /**
     * Generates a resource name of bidding strategy type.
     *
     * @param string $customerId
     * @param string $biddingStrategyId
     * @return string the bidding strategy resource name
     */
    public static function forBiddingStrategy(
        $customerId,
        $biddingStrategyId
    ): string {
        return BiddingStrategyServiceClient::biddingStrategyName(
            $customerId,
            $biddingStrategyId
        );
    }

    /**
     * Generates a resource name of bidding strategy simulation type.
     *
     * @param string $customerId
     * @param string $biddingStrategyId
     * @param string $type
     * @param string $modificationMethod
     * @param string $startDate
     * @param string $endDate
     * @return string the bidding strategy simulation resource name
     */
    public static function forBiddingStrategySimulation(
        $customerId,
        $biddingStrategyId,
        $type,
        $modificationMethod,
        $startDate,
        $endDate
    ): string {
        return BiddingStrategySimulationServiceClient::biddingStrategySimulationName(
            $customerId,
            $biddingStrategyId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
    }

    /**
     * Generates a resource name of billing setup type.
     *
     * @param string $customerId
     * @param string $billingSetupId
     * @return string the billing setup resource name
     */
    public static function forBillingSetup(
        $customerId,
        $billingSetupId
    ): string {
        return BillingSetupServiceClient::billingSetupName(
            $customerId,
            $billingSetupId
        );
    }

    /**
     * Generates a resource name of campaign type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @return string the campaign resource name
     */
    public static function forCampaign(
        $customerId,
        $campaignId
    ): string {
        return CampaignServiceClient::campaignName(
            $customerId,
            $campaignId
        );
    }

    /**
     * Generates a resource name of campaign asset type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $assetId
     * @param string $fieldType
     * @return string the campaign asset resource name
     */
    public static function forCampaignAsset(
        $customerId,
        $campaignId,
        $assetId,
        $fieldType
    ): string {
        return CampaignAssetServiceClient::campaignAssetName(
            $customerId,
            $campaignId,
            $assetId,
            $fieldType
        );
    }

    /**
     * Generates a resource name of campaign audience view type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $criterionId
     * @return string the campaign audience view resource name
     */
    public static function forCampaignAudienceView(
        $customerId,
        $campaignId,
        $criterionId
    ): string {
        return CampaignAudienceViewServiceClient::campaignAudienceViewName(
            $customerId,
            $campaignId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of campaign bid modifier type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $criterionId
     * @return string the campaign bid modifier resource name
     */
    public static function forCampaignBidModifier(
        $customerId,
        $campaignId,
        $criterionId
    ): string {
        return CampaignBidModifierServiceClient::campaignBidModifierName(
            $customerId,
            $campaignId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of campaign budget type.
     *
     * @param string $customerId
     * @param string $campaignBudgetId
     * @return string the campaign budget resource name
     */
    public static function forCampaignBudget(
        $customerId,
        $campaignBudgetId
    ): string {
        return CampaignBudgetServiceClient::campaignBudgetName(
            $customerId,
            $campaignBudgetId
        );
    }

    /**
     * Generates a resource name of campaign criterion type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $criterionId
     * @return string the campaign criterion resource name
     */
    public static function forCampaignCriterion(
        $customerId,
        $campaignId,
        $criterionId
    ): string {
        return CampaignCriterionServiceClient::campaignCriterionName(
            $customerId,
            $campaignId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of campaign criterion simulation type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $criterionId
     * @param string $type
     * @param string $modificationMethod
     * @param string $startDate
     * @param string $endDate
     * @return string the campaign criterion simulation resource name
     */
    public static function forCampaignCriterionSimulation(
        $customerId,
        $campaignId,
        $criterionId,
        $type,
        $modificationMethod,
        $startDate,
        $endDate
    ): string {
        return CampaignCriterionSimulationServiceClient::campaignCriterionSimulationName(
            $customerId,
            $campaignId,
            $criterionId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
    }

    /**
     * Generates a resource name of campaign draft type.
     *
     * @param string $customerId
     * @param string $baseCampaignId
     * @param string $draftId
     * @return string the campaign draft resource name
     */
    public static function forCampaignDraft(
        $customerId,
        $baseCampaignId,
        $draftId
    ): string {
        return CampaignDraftServiceClient::campaignDraftName(
            $customerId,
            $baseCampaignId,
            $draftId
        );
    }

    /**
     * Generates a resource name of campaign experiment type.
     *
     * @param string $customerId
     * @param string $campaignExperimentId
     * @return string the campaign experiment resource name
     */
    public static function forCampaignExperiment(
        $customerId,
        $campaignExperimentId
    ): string {
        return CampaignExperimentServiceClient::campaignExperimentName(
            $customerId,
            $campaignExperimentId
        );
    }

    /**
     * Generates a resource name of campaign extension setting type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $extensionType
     * @return string the campaign extension setting resource name
     */
    public static function forCampaignExtensionSetting(
        $customerId,
        $campaignId,
        $extensionType
    ): string {
        return CampaignExtensionSettingServiceClient::campaignExtensionSettingName(
            $customerId,
            $campaignId,
            $extensionType
        );
    }

    /**
     * Generates a resource name of campaign feed type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $feedId
     * @return string the campaign feed resource name
     */
    public static function forCampaignFeed(
        $customerId,
        $campaignId,
        $feedId
    ): string {
        return CampaignFeedServiceClient::campaignFeedName(
            $customerId,
            $campaignId,
            $feedId
        );
    }

    /**
     * Generates a resource name of campaign label type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $labelId
     * @return string the campaign label resource name
     */
    public static function forCampaignLabel(
        $customerId,
        $campaignId,
        $labelId
    ): string {
        return CampaignLabelServiceClient::campaignLabelName(
            $customerId,
            $campaignId,
            $labelId
        );
    }

    /**
     * Generates a resource name of campaign shared set type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $sharedSetId
     * @return string the campaign shared set resource name
     */
    public static function forCampaignSharedSet(
        $customerId,
        $campaignId,
        $sharedSetId
    ): string {
        return CampaignSharedSetServiceClient::campaignSharedSetName(
            $customerId,
            $campaignId,
            $sharedSetId
        );
    }

    /**
     * Generates a resource name of campaign simulation type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $type
     * @param string $modificationMethod
     * @param string $startDate
     * @param string $endDate
     * @return string the campaign simulation resource name
     */
    public static function forCampaignSimulation(
        $customerId,
        $campaignId,
        $type,
        $modificationMethod,
        $startDate,
        $endDate
    ): string {
        return CampaignSimulationServiceClient::campaignSimulationName(
            $customerId,
            $campaignId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
    }

    /**
     * Generates a resource name of carrier constant type.
     *
     * @param string $criterionId
     * @return string the carrier constant resource name
     */
    public static function forCarrierConstant(
        $criterionId
    ): string {
        return CarrierConstantServiceClient::carrierConstantName(
            $criterionId
        );
    }

    /**
     * Generates a resource name of change status type.
     *
     * @param string $customerId
     * @param string $changeStatusId
     * @return string the change status resource name
     */
    public static function forChangeStatus(
        $customerId,
        $changeStatusId
    ): string {
        return ChangeStatusServiceClient::changeStatusName(
            $customerId,
            $changeStatusId
        );
    }

    /**
     * Generates a resource name of click view type.
     *
     * @param string $customerId
     * @param string $date
     * @param string $gclid
     * @return string the click view resource name
     */
    public static function forClickView(
        $customerId,
        $date,
        $gclid
    ): string {
        return ClickViewServiceClient::clickViewName(
            $customerId,
            $date,
            $gclid
        );
    }

    /**
     * Generates a resource name of combined audience type.
     *
     * @param string $customerId
     * @param string $combinedAudienceId
     * @return string the combined audience resource name
     */
    public static function forCombinedAudience(
        $customerId,
        $combinedAudienceId
    ): string {
        return CombinedAudienceServiceClient::combinedAudienceName(
            $customerId,
            $combinedAudienceId
        );
    }

    /**
     * Generates a resource name of conversion action type.
     *
     * @param string $customerId
     * @param string $conversionActionId
     * @return string the conversion action resource name
     */
    public static function forConversionAction(
        $customerId,
        $conversionActionId
    ): string {
        return ConversionActionServiceClient::conversionActionName(
            $customerId,
            $conversionActionId
        );
    }

    /**
     * Generates a resource name of conversion custom variable type.
     *
     * @param string $customerId
     * @param string $conversionCustomVariableId
     * @return string the conversion custom variable resource name
     */
    public static function forConversionCustomVariable(
        $customerId,
        $conversionCustomVariableId
    ): string {
        return ConversionCustomVariableServiceClient::conversionCustomVariableName(
            $customerId,
            $conversionCustomVariableId
        );
    }

    /**
     * Generates a resource name of currency constant type.
     *
     * @param string $code
     * @return string the currency constant resource name
     */
    public static function forCurrencyConstant(
        $code
    ): string {
        return CurrencyConstantServiceClient::currencyConstantName(
            $code
        );
    }

    /**
     * Generates a resource name of custom audience type.
     *
     * @param string $customerId
     * @param string $customAudienceId
     * @return string the custom audience resource name
     */
    public static function forCustomAudience(
        $customerId,
        $customAudienceId
    ): string {
        return CustomAudienceServiceClient::customAudienceName(
            $customerId,
            $customAudienceId
        );
    }

    /**
     * Generates a resource name of customer type.
     *
     * @param string $customerId
     * @return string the customer resource name
     */
    public static function forCustomer(
        $customerId
    ): string {
        return CustomerServiceClient::customerName(
            $customerId
        );
    }

    /**
     * Generates a resource name of customer asset type.
     *
     * @param string $customerId
     * @param string $assetId
     * @param string $fieldType
     * @return string the customer asset resource name
     */
    public static function forCustomerAsset(
        $customerId,
        $assetId,
        $fieldType
    ): string {
        return CustomerAssetServiceClient::customerAssetName(
            $customerId,
            $assetId,
            $fieldType
        );
    }

    /**
     * Generates a resource name of customer client type.
     *
     * @param string $customerId
     * @param string $clientCustomerId
     * @return string the customer client resource name
     */
    public static function forCustomerClient(
        $customerId,
        $clientCustomerId
    ): string {
        return CustomerClientServiceClient::customerClientName(
            $customerId,
            $clientCustomerId
        );
    }

    /**
     * Generates a resource name of customer client link type.
     *
     * @param string $customerId
     * @param string $clientCustomerId
     * @param string $managerLinkId
     * @return string the customer client link resource name
     */
    public static function forCustomerClientLink(
        $customerId,
        $clientCustomerId,
        $managerLinkId
    ): string {
        return CustomerClientLinkServiceClient::customerClientLinkName(
            $customerId,
            $clientCustomerId,
            $managerLinkId
        );
    }

    /**
     * Generates a resource name of customer extension setting type.
     *
     * @param string $customerId
     * @param string $extensionType
     * @return string the customer extension setting resource name
     */
    public static function forCustomerExtensionSetting(
        $customerId,
        $extensionType
    ): string {
        return CustomerExtensionSettingServiceClient::customerExtensionSettingName(
            $customerId,
            $extensionType
        );
    }

    /**
     * Generates a resource name of customer feed type.
     *
     * @param string $customerId
     * @param string $feedId
     * @return string the customer feed resource name
     */
    public static function forCustomerFeed(
        $customerId,
        $feedId
    ): string {
        return CustomerFeedServiceClient::customerFeedName(
            $customerId,
            $feedId
        );
    }

    /**
     * Generates a resource name of customer label type.
     *
     * @param string $customerId
     * @param string $labelId
     * @return string the customer label resource name
     */
    public static function forCustomerLabel(
        $customerId,
        $labelId
    ): string {
        return CustomerLabelServiceClient::customerLabelName(
            $customerId,
            $labelId
        );
    }

    /**
     * Generates a resource name of customer manager link type.
     *
     * @param string $customerId
     * @param string $managerCustomerId
     * @param string $managerLinkId
     * @return string the customer manager link resource name
     */
    public static function forCustomerManagerLink(
        $customerId,
        $managerCustomerId,
        $managerLinkId
    ): string {
        return CustomerManagerLinkServiceClient::customerManagerLinkName(
            $customerId,
            $managerCustomerId,
            $managerLinkId
        );
    }

    /**
     * Generates a resource name of customer negative criterion type.
     *
     * @param string $customerId
     * @param string $criterionId
     * @return string the customer negative criterion resource name
     */
    public static function forCustomerNegativeCriterion(
        $customerId,
        $criterionId
    ): string {
        return CustomerNegativeCriterionServiceClient::customerNegativeCriterionName(
            $customerId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of customer user access type.
     *
     * @param string $customerId
     * @param string $userId
     * @return string the customer user access resource name
     */
    public static function forCustomerUserAccess(
        $customerId,
        $userId
    ): string {
        return CustomerUserAccessServiceClient::customerUserAccessName(
            $customerId,
            $userId
        );
    }

    /**
     * Generates a resource name of customer user access invitation type.
     *
     * @param string $customerId
     * @param string $invitationId
     * @return string the customer user access invitation resource name
     */
    public static function forCustomerUserAccessInvitation(
        $customerId,
        $invitationId
    ): string {
        return CustomerUserAccessInvitationServiceClient::customerUserAccessInvitationName(
            $customerId,
            $invitationId
        );
    }

    /**
     * Generates a resource name of custom interest type.
     *
     * @param string $customerId
     * @param string $customInterestId
     * @return string the custom interest resource name
     */
    public static function forCustomInterest(
        $customerId,
        $customInterestId
    ): string {
        return CustomInterestServiceClient::customInterestName(
            $customerId,
            $customInterestId
        );
    }

    /**
     * Generates a resource name of detailed demographic type.
     *
     * @param string $customerId
     * @param string $detailedDemographicId
     * @return string the detailed demographic resource name
     */
    public static function forDetailedDemographic(
        $customerId,
        $detailedDemographicId
    ): string {
        return DetailedDemographicServiceClient::detailedDemographicName(
            $customerId,
            $detailedDemographicId
        );
    }

    /**
     * Generates a resource name of detail placement view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $base64Placement
     * @return string the detail placement view resource name
     */
    public static function forDetailPlacementView(
        $customerId,
        $adGroupId,
        $base64Placement
    ): string {
        return DetailPlacementViewServiceClient::detailPlacementViewName(
            $customerId,
            $adGroupId,
            $base64Placement
        );
    }

    /**
     * Generates a resource name of display keyword view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the display keyword view resource name
     */
    public static function forDisplayKeywordView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return DisplayKeywordViewServiceClient::displayKeywordViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of distance view type.
     *
     * @param string $customerId
     * @param string $placeholderChainId
     * @param string $distanceBucket
     * @return string the distance view resource name
     */
    public static function forDistanceView(
        $customerId,
        $placeholderChainId,
        $distanceBucket
    ): string {
        return DistanceViewServiceClient::distanceViewName(
            $customerId,
            $placeholderChainId,
            $distanceBucket
        );
    }

    /**
     * Generates a resource name of domain category type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $base64Category
     * @param string $languageCode
     * @return string the domain category resource name
     */
    public static function forDomainCategory(
        $customerId,
        $campaignId,
        $base64Category,
        $languageCode
    ): string {
        return DomainCategoryServiceClient::domainCategoryName(
            $customerId,
            $campaignId,
            $base64Category,
            $languageCode
        );
    }

    /**
     * Generates a resource name of dynamic search ads search term view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $searchTermFingerprint
     * @param string $headlineFingerprint
     * @param string $landingPageFingerprint
     * @param string $pageUrlFingerprint
     * @return string the dynamic search ads search term view resource name
     */
    public static function forDynamicSearchAdsSearchTermView(
        $customerId,
        $adGroupId,
        $searchTermFingerprint,
        $headlineFingerprint,
        $landingPageFingerprint,
        $pageUrlFingerprint
    ): string {
        return DynamicSearchAdsSearchTermViewServiceClient::dynamicSearchAdsSearchTermViewName(
            $customerId,
            $adGroupId,
            $searchTermFingerprint,
            $headlineFingerprint,
            $landingPageFingerprint,
            $pageUrlFingerprint
        );
    }

    /**
     * Generates a resource name of expanded landing page view type.
     *
     * @param string $customerId
     * @param string $expandedFinalUrlFingerprint
     * @return string the expanded landing page view resource name
     */
    public static function forExpandedLandingPageView(
        $customerId,
        $expandedFinalUrlFingerprint
    ): string {
        return ExpandedLandingPageViewServiceClient::expandedLandingPageViewName(
            $customerId,
            $expandedFinalUrlFingerprint
        );
    }

    /**
     * Generates a resource name of extension feed item type.
     *
     * @param string $customerId
     * @param string $feedItemId
     * @return string the extension feed item resource name
     */
    public static function forExtensionFeedItem(
        $customerId,
        $feedItemId
    ): string {
        return ExtensionFeedItemServiceClient::extensionFeedItemName(
            $customerId,
            $feedItemId
        );
    }

    /**
     * Generates a resource name of feed type.
     *
     * @param string $customerId
     * @param string $feedId
     * @return string the feed resource name
     */
    public static function forFeed(
        $customerId,
        $feedId
    ): string {
        return FeedServiceClient::feedName(
            $customerId,
            $feedId
        );
    }

    /**
     * Generates a resource name of feed item type.
     *
     * @param string $customerId
     * @param string $feedId
     * @param string $feedItemId
     * @return string the feed item resource name
     */
    public static function forFeedItem(
        $customerId,
        $feedId,
        $feedItemId
    ): string {
        return FeedItemServiceClient::feedItemName(
            $customerId,
            $feedId,
            $feedItemId
        );
    }

    /**
     * Generates a resource name of feed item set type.
     *
     * @param string $customerId
     * @param string $feedId
     * @param string $feedItemSetId
     * @return string the feed item set resource name
     */
    public static function forFeedItemSet(
        $customerId,
        $feedId,
        $feedItemSetId
    ): string {
        return FeedItemSetServiceClient::feedItemSetName(
            $customerId,
            $feedId,
            $feedItemSetId
        );
    }

    /**
     * Generates a resource name of feed item set link type.
     *
     * @param string $customerId
     * @param string $feedId
     * @param string $feedItemSetId
     * @param string $feedItemId
     * @return string the feed item set link resource name
     */
    public static function forFeedItemSetLink(
        $customerId,
        $feedId,
        $feedItemSetId,
        $feedItemId
    ): string {
        return FeedItemSetLinkServiceClient::feedItemSetLinkName(
            $customerId,
            $feedId,
            $feedItemSetId,
            $feedItemId
        );
    }

    /**
     * Generates a resource name of feed item target type.
     *
     * @param string $customerId
     * @param string $feedId
     * @param string $feedItemId
     * @param string $feedItemTargetType
     * @param string $feedItemTargetId
     * @return string the feed item target resource name
     */
    public static function forFeedItemTarget(
        $customerId,
        $feedId,
        $feedItemId,
        $feedItemTargetType,
        $feedItemTargetId
    ): string {
        return FeedItemTargetServiceClient::feedItemTargetName(
            $customerId,
            $feedId,
            $feedItemId,
            $feedItemTargetType,
            $feedItemTargetId
        );
    }

    /**
     * Generates a resource name of feed mapping type.
     *
     * @param string $customerId
     * @param string $feedId
     * @param string $feedMappingId
     * @return string the feed mapping resource name
     */
    public static function forFeedMapping(
        $customerId,
        $feedId,
        $feedMappingId
    ): string {
        return FeedMappingServiceClient::feedMappingName(
            $customerId,
            $feedId,
            $feedMappingId
        );
    }

    /**
     * Generates a resource name of feed placeholder view type.
     *
     * @param string $customerId
     * @param string $placeholderType
     * @return string the feed placeholder view resource name
     */
    public static function forFeedPlaceholderView(
        $customerId,
        $placeholderType
    ): string {
        return FeedPlaceholderViewServiceClient::feedPlaceholderViewName(
            $customerId,
            $placeholderType
        );
    }

    /**
     * Generates a resource name of gender view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the gender view resource name
     */
    public static function forGenderView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return GenderViewServiceClient::genderViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of geographic view type.
     *
     * @param string $customerId
     * @param string $countryCriterionId
     * @param string $locationType
     * @return string the geographic view resource name
     */
    public static function forGeographicView(
        $customerId,
        $countryCriterionId,
        $locationType
    ): string {
        return GeographicViewServiceClient::geographicViewName(
            $customerId,
            $countryCriterionId,
            $locationType
        );
    }

    /**
     * Generates a resource name of geo target constant type.
     *
     * @param string $criterionId
     * @return string the geo target constant resource name
     */
    public static function forGeoTargetConstant(
        $criterionId
    ): string {
        return GeoTargetConstantServiceClient::geoTargetConstantName(
            $criterionId
        );
    }

    /**
     * Generates a resource name of google ads field type.
     *
     * @param string $googleAdsField
     * @return string the google ads field resource name
     */
    public static function forGoogleAdsField(
        $googleAdsField
    ): string {
        return GoogleAdsFieldServiceClient::googleAdsFieldName(
            $googleAdsField
        );
    }

    /**
     * Generates a resource name of group placement view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $base64Placement
     * @return string the group placement view resource name
     */
    public static function forGroupPlacementView(
        $customerId,
        $adGroupId,
        $base64Placement
    ): string {
        return GroupPlacementViewServiceClient::groupPlacementViewName(
            $customerId,
            $adGroupId,
            $base64Placement
        );
    }

    /**
     * Generates a resource name of hotel group view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the hotel group view resource name
     */
    public static function forHotelGroupView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return HotelGroupViewServiceClient::hotelGroupViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of hotel performance view type.
     *
     * @param string $customerId
     * @return string the hotel performance view resource name
     */
    public static function forHotelPerformanceView(
        $customerId
    ): string {
        return HotelPerformanceViewServiceClient::hotelPerformanceViewName(
            $customerId
        );
    }

    /**
     * Generates a resource name of income range view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the income range view resource name
     */
    public static function forIncomeRangeView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return IncomeRangeViewServiceClient::incomeRangeViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of keyword plan type.
     *
     * @param string $customerId
     * @param string $keywordPlanId
     * @return string the keyword plan resource name
     */
    public static function forKeywordPlan(
        $customerId,
        $keywordPlanId
    ): string {
        return KeywordPlanServiceClient::keywordPlanName(
            $customerId,
            $keywordPlanId
        );
    }

    /**
     * Generates a resource name of keyword plan ad group type.
     *
     * @param string $customerId
     * @param string $keywordPlanAdGroupId
     * @return string the keyword plan ad group resource name
     */
    public static function forKeywordPlanAdGroup(
        $customerId,
        $keywordPlanAdGroupId
    ): string {
        return KeywordPlanAdGroupServiceClient::keywordPlanAdGroupName(
            $customerId,
            $keywordPlanAdGroupId
        );
    }

    /**
     * Generates a resource name of keyword plan ad group keyword type.
     *
     * @param string $customerId
     * @param string $keywordPlanAdGroupKeywordId
     * @return string the keyword plan ad group keyword resource name
     */
    public static function forKeywordPlanAdGroupKeyword(
        $customerId,
        $keywordPlanAdGroupKeywordId
    ): string {
        return KeywordPlanAdGroupKeywordServiceClient::keywordPlanAdGroupKeywordName(
            $customerId,
            $keywordPlanAdGroupKeywordId
        );
    }

    /**
     * Generates a resource name of keyword plan campaign type.
     *
     * @param string $customerId
     * @param string $keywordPlanCampaignId
     * @return string the keyword plan campaign resource name
     */
    public static function forKeywordPlanCampaign(
        $customerId,
        $keywordPlanCampaignId
    ): string {
        return KeywordPlanCampaignServiceClient::keywordPlanCampaignName(
            $customerId,
            $keywordPlanCampaignId
        );
    }

    /**
     * Generates a resource name of keyword plan campaign keyword type.
     *
     * @param string $customerId
     * @param string $keywordPlanCampaignKeywordId
     * @return string the keyword plan campaign keyword resource name
     */
    public static function forKeywordPlanCampaignKeyword(
        $customerId,
        $keywordPlanCampaignKeywordId
    ): string {
        return KeywordPlanCampaignKeywordServiceClient::keywordPlanCampaignKeywordName(
            $customerId,
            $keywordPlanCampaignKeywordId
        );
    }

    /**
     * Generates a resource name of keyword theme constant type.
     *
     * @param string $expressCategoryId
     * @param string $expressSubCategoryId
     * @return string the keyword theme constant resource name
     */
    public static function forKeywordThemeConstant(
        $expressCategoryId,
        $expressSubCategoryId
    ): string {
        return KeywordThemeConstantServiceClient::keywordThemeConstantName(
            $expressCategoryId,
            $expressSubCategoryId
        );
    }

    /**
     * Generates a resource name of keyword view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the keyword view resource name
     */
    public static function forKeywordView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return KeywordViewServiceClient::keywordViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of label type.
     *
     * @param string $customerId
     * @param string $labelId
     * @return string the label resource name
     */
    public static function forLabel(
        $customerId,
        $labelId
    ): string {
        return LabelServiceClient::labelName(
            $customerId,
            $labelId
        );
    }

    /**
     * Generates a resource name of landing page view type.
     *
     * @param string $customerId
     * @param string $unexpandedFinalUrlFingerprint
     * @return string the landing page view resource name
     */
    public static function forLandingPageView(
        $customerId,
        $unexpandedFinalUrlFingerprint
    ): string {
        return LandingPageViewServiceClient::landingPageViewName(
            $customerId,
            $unexpandedFinalUrlFingerprint
        );
    }

    /**
     * Generates a resource name of language constant type.
     *
     * @param string $criterionId
     * @return string the language constant resource name
     */
    public static function forLanguageConstant(
        $criterionId
    ): string {
        return LanguageConstantServiceClient::languageConstantName(
            $criterionId
        );
    }

    /**
     * Generates a resource name of life event type.
     *
     * @param string $customerId
     * @param string $lifeEventId
     * @return string the life event resource name
     */
    public static function forLifeEvent(
        $customerId,
        $lifeEventId
    ): string {
        return LifeEventServiceClient::lifeEventName(
            $customerId,
            $lifeEventId
        );
    }

    /**
     * Generates a resource name of location view type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $criterionId
     * @return string the location view resource name
     */
    public static function forLocationView(
        $customerId,
        $campaignId,
        $criterionId
    ): string {
        return LocationViewServiceClient::locationViewName(
            $customerId,
            $campaignId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of managed placement view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the managed placement view resource name
     */
    public static function forManagedPlacementView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return ManagedPlacementViewServiceClient::managedPlacementViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of media file type.
     *
     * @param string $customerId
     * @param string $mediaFileId
     * @return string the media file resource name
     */
    public static function forMediaFile(
        $customerId,
        $mediaFileId
    ): string {
        return MediaFileServiceClient::mediaFileName(
            $customerId,
            $mediaFileId
        );
    }

    /**
     * Generates a resource name of merchant center link type.
     *
     * @param string $customerId
     * @param string $merchantCenterId
     * @return string the merchant center link resource name
     */
    public static function forMerchantCenterLink(
        $customerId,
        $merchantCenterId
    ): string {
        return MerchantCenterLinkServiceClient::merchantCenterLinkName(
            $customerId,
            $merchantCenterId
        );
    }

    /**
     * Generates a resource name of mobile app category constant type.
     *
     * @param string $mobileAppCategoryId
     * @return string the mobile app category constant resource name
     */
    public static function forMobileAppCategoryConstant(
        $mobileAppCategoryId
    ): string {
        return MobileAppCategoryConstantServiceClient::mobileAppCategoryConstantName(
            $mobileAppCategoryId
        );
    }

    /**
     * Generates a resource name of mobile device constant type.
     *
     * @param string $criterionId
     * @return string the mobile device constant resource name
     */
    public static function forMobileDeviceConstant(
        $criterionId
    ): string {
        return MobileDeviceConstantServiceClient::mobileDeviceConstantName(
            $criterionId
        );
    }

    /**
     * Generates a resource name of offline user data job type.
     *
     * @param string $customerId
     * @param string $offlineUserDataUpdateId
     * @return string the offline user data job resource name
     */
    public static function forOfflineUserDataJob(
        $customerId,
        $offlineUserDataUpdateId
    ): string {
        return OfflineUserDataJobServiceClient::offlineUserDataJobName(
            $customerId,
            $offlineUserDataUpdateId
        );
    }

    /**
     * Generates a resource name of operating system version constant type.
     *
     * @param string $criterionId
     * @return string the operating system version constant resource name
     */
    public static function forOperatingSystemVersionConstant(
        $criterionId
    ): string {
        return OperatingSystemVersionConstantServiceClient::operatingSystemVersionConstantName(
            $criterionId
        );
    }

    /**
     * Generates a resource name of paid organic search term view type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $adGroupId
     * @param string $base64SearchTerm
     * @return string the paid organic search term view resource name
     */
    public static function forPaidOrganicSearchTermView(
        $customerId,
        $campaignId,
        $adGroupId,
        $base64SearchTerm
    ): string {
        return PaidOrganicSearchTermViewServiceClient::paidOrganicSearchTermViewName(
            $customerId,
            $campaignId,
            $adGroupId,
            $base64SearchTerm
        );
    }

    /**
     * Generates a resource name of parental status view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the parental status view resource name
     */
    public static function forParentalStatusView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return ParentalStatusViewServiceClient::parentalStatusViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of product bidding category constant type.
     *
     * @param string $countryCode
     * @param string $level
     * @param string $id
     * @return string the product bidding category constant resource name
     */
    public static function forProductBiddingCategoryConstant(
        $countryCode,
        $level,
        $id
    ): string {
        return ProductBiddingCategoryConstantServiceClient::productBiddingCategoryConstantName(
            $countryCode,
            $level,
            $id
        );
    }

    /**
     * Generates a resource name of product group view type.
     *
     * @param string $customerId
     * @param string $adgroupId
     * @param string $criterionId
     * @return string the product group view resource name
     */
    public static function forProductGroupView(
        $customerId,
        $adgroupId,
        $criterionId
    ): string {
        return ProductGroupViewServiceClient::productGroupViewName(
            $customerId,
            $adgroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of recommendation type.
     *
     * @param string $customerId
     * @param string $recommendationId
     * @return string the recommendation resource name
     */
    public static function forRecommendation(
        $customerId,
        $recommendationId
    ): string {
        return RecommendationServiceClient::recommendationName(
            $customerId,
            $recommendationId
        );
    }

    /**
     * Generates a resource name of remarketing action type.
     *
     * @param string $customerId
     * @param string $remarketingActionId
     * @return string the remarketing action resource name
     */
    public static function forRemarketingAction(
        $customerId,
        $remarketingActionId
    ): string {
        return RemarketingActionServiceClient::remarketingActionName(
            $customerId,
            $remarketingActionId
        );
    }

    /**
     * Generates a resource name of search term view type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $adGroupId
     * @param string $query
     * @return string the search term view resource name
     */
    public static function forSearchTermView(
        $customerId,
        $campaignId,
        $adGroupId,
        $query
    ): string {
        return SearchTermViewServiceClient::searchTermViewName(
            $customerId,
            $campaignId,
            $adGroupId,
            $query
        );
    }

    /**
     * Generates a resource name of shared criterion type.
     *
     * @param string $customerId
     * @param string $sharedSetId
     * @param string $criterionId
     * @return string the shared criterion resource name
     */
    public static function forSharedCriterion(
        $customerId,
        $sharedSetId,
        $criterionId
    ): string {
        return SharedCriterionServiceClient::sharedCriterionName(
            $customerId,
            $sharedSetId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of shared set type.
     *
     * @param string $customerId
     * @param string $sharedSetId
     * @return string the shared set resource name
     */
    public static function forSharedSet(
        $customerId,
        $sharedSetId
    ): string {
        return SharedSetServiceClient::sharedSetName(
            $customerId,
            $sharedSetId
        );
    }

    /**
     * Generates a resource name of shopping performance view type.
     *
     * @param string $customerId
     * @return string the shopping performance view resource name
     */
    public static function forShoppingPerformanceView(
        $customerId
    ): string {
        return ShoppingPerformanceViewServiceClient::shoppingPerformanceViewName(
            $customerId
        );
    }

    /**
     * Generates a resource name of smart campaign search term view type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $query
     * @return string the smart campaign search term view resource name
     */
    public static function forSmartCampaignSearchTermView(
        $customerId,
        $campaignId,
        $query
    ): string {
        return SmartCampaignSearchTermViewServiceClient::smartCampaignSearchTermViewName(
            $customerId,
            $campaignId,
            $query
        );
    }

    /**
     * Generates a resource name of smart campaign setting type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @return string the smart campaign setting resource name
     */
    public static function forSmartCampaignSetting(
        $customerId,
        $campaignId
    ): string {
        return SmartCampaignSettingServiceClient::smartCampaignSettingName(
            $customerId,
            $campaignId
        );
    }

    /**
     * Generates a resource name of third party app analytics link type.
     *
     * @param string $customerId
     * @param string $customerLinkId
     * @return string the third party app analytics link resource name
     */
    public static function forThirdPartyAppAnalyticsLink(
        $customerId,
        $customerLinkId
    ): string {
        return ThirdPartyAppAnalyticsLinkServiceClient::thirdPartyAppAnalyticsLinkName(
            $customerId,
            $customerLinkId
        );
    }

    /**
     * Generates a resource name of topic constant type.
     *
     * @param string $topicId
     * @return string the topic constant resource name
     */
    public static function forTopicConstant(
        $topicId
    ): string {
        return TopicConstantServiceClient::topicConstantName(
            $topicId
        );
    }

    /**
     * Generates a resource name of topic view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the topic view resource name
     */
    public static function forTopicView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return TopicViewServiceClient::topicViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of user interest type.
     *
     * @param string $customerId
     * @param string $userInterestId
     * @return string the user interest resource name
     */
    public static function forUserInterest(
        $customerId,
        $userInterestId
    ): string {
        return UserInterestServiceClient::userInterestName(
            $customerId,
            $userInterestId
        );
    }

    /**
     * Generates a resource name of user list type.
     *
     * @param string $customerId
     * @param string $userListId
     * @return string the user list resource name
     */
    public static function forUserList(
        $customerId,
        $userListId
    ): string {
        return UserListServiceClient::userListName(
            $customerId,
            $userListId
        );
    }

    /**
     * Generates a resource name of user location view type.
     *
     * @param string $customerId
     * @param string $countryCriterionId
     * @param string $isTargetingLocation
     * @return string the user location view resource name
     */
    public static function forUserLocationView(
        $customerId,
        $countryCriterionId,
        $isTargetingLocation
    ): string {
        return UserLocationViewServiceClient::userLocationViewName(
            $customerId,
            $countryCriterionId,
            $isTargetingLocation
        );
    }

    /**
     * Generates a resource name of video type.
     *
     * @param string $customerId
     * @param string $videoId
     * @return string the video resource name
     */
    public static function forVideo(
        $customerId,
        $videoId
    ): string {
        return VideoServiceClient::videoName(
            $customerId,
            $videoId
        );
    }

    /**
     * Generates a resource name of webpage view type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @return string the webpage view resource name
     */
    public static function forWebpageView(
        $customerId,
        $adGroupId,
        $criterionId
    ): string {
        return WebpageViewServiceClient::webpageViewName(
            $customerId,
            $adGroupId,
            $criterionId
        );
    }
}

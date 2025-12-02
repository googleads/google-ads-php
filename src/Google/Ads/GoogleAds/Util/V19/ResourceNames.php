<?php

/**
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Util\V19;

use Google\Ads\GoogleAds\V19\Services\Client\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupAssetSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdGroupServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdParameterServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AdServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AssetSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\AudienceServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\BatchJobServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerAssetSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerSkAdNetworkConversionValueSchemaServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\DataLinkServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ExperimentServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\LabelServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\LocalServicesLeadServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ProductLinkInvitationServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ProductLinkServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\RecommendationServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\RecommendationSubscriptionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\SharedSetServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\UserListCustomerTypeServiceClient;
use Google\Ads\GoogleAds\V19\Services\Client\UserListServiceClient;

/**
 * Provides resource names for Google Ads API entities.
 */
final class ResourceNames
{
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
        return BatchJobServiceClient::accessibleBiddingStrategyName(
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
        return AccountBudgetProposalServiceClient::accountBudgetName(
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
     * Generates a resource name of ad group asset set type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $assetSetId
     * @return string the ad group asset set resource name
     */
    public static function forAdGroupAssetSet(
        $customerId,
        $adGroupId,
        $assetSetId
    ): string {
        return AdGroupAssetSetServiceClient::adGroupAssetSetName(
            $customerId,
            $adGroupId,
            $assetSetId
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
     * Generates a resource name of ad group criterion customizer type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $criterionId
     * @param string $customizerAttributeId
     * @return string the ad group criterion customizer resource name
     */
    public static function forAdGroupCriterionCustomizer(
        $customerId,
        $adGroupId,
        $criterionId,
        $customizerAttributeId
    ): string {
        return AdGroupCriterionCustomizerServiceClient::adGroupCriterionCustomizerName(
            $customerId,
            $adGroupId,
            $criterionId,
            $customizerAttributeId
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
     * Generates a resource name of ad group customizer type.
     *
     * @param string $customerId
     * @param string $adGroupId
     * @param string $customizerAttributeId
     * @return string the ad group customizer resource name
     */
    public static function forAdGroupCustomizer(
        $customerId,
        $adGroupId,
        $customizerAttributeId
    ): string {
        return AdGroupCustomizerServiceClient::adGroupCustomizerName(
            $customerId,
            $adGroupId,
            $customizerAttributeId
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
     * Generates a resource name of asset group type.
     *
     * @param string $customerId
     * @param string $assetGroupId
     * @return string the asset group resource name
     */
    public static function forAssetGroup(
        $customerId,
        $assetGroupId
    ): string {
        return AssetGroupServiceClient::assetGroupName(
            $customerId,
            $assetGroupId
        );
    }

    /**
     * Generates a resource name of asset group asset type.
     *
     * @param string $customerId
     * @param string $assetGroupId
     * @param string $assetId
     * @param string $fieldType
     * @return string the asset group asset resource name
     */
    public static function forAssetGroupAsset(
        $customerId,
        $assetGroupId,
        $assetId,
        $fieldType
    ): string {
        return AssetGroupAssetServiceClient::assetGroupAssetName(
            $customerId,
            $assetGroupId,
            $assetId,
            $fieldType
        );
    }

    /**
     * Generates a resource name of asset group listing group filter type.
     *
     * @param string $customerId
     * @param string $assetGroupId
     * @param string $listingGroupFilterId
     * @return string the asset group listing group filter resource name
     */
    public static function forAssetGroupListingGroupFilter(
        $customerId,
        $assetGroupId,
        $listingGroupFilterId
    ): string {
        return AssetGroupListingGroupFilterServiceClient::assetGroupListingGroupFilterName(
            $customerId,
            $assetGroupId,
            $listingGroupFilterId
        );
    }

    /**
     * Generates a resource name of asset group signal type.
     *
     * @param string $customerId
     * @param string $assetGroupId
     * @param string $criterionId
     * @return string the asset group signal resource name
     */
    public static function forAssetGroupSignal(
        $customerId,
        $assetGroupId,
        $criterionId
    ): string {
        return AssetGroupSignalServiceClient::assetGroupSignalName(
            $customerId,
            $assetGroupId,
            $criterionId
        );
    }

    /**
     * Generates a resource name of asset set type.
     *
     * @param string $customerId
     * @param string $assetSetId
     * @return string the asset set resource name
     */
    public static function forAssetSet(
        $customerId,
        $assetSetId
    ): string {
        return AssetSetServiceClient::assetSetName(
            $customerId,
            $assetSetId
        );
    }

    /**
     * Generates a resource name of asset set asset type.
     *
     * @param string $customerId
     * @param string $assetSetId
     * @param string $assetId
     * @return string the asset set asset resource name
     */
    public static function forAssetSetAsset(
        $customerId,
        $assetSetId,
        $assetId
    ): string {
        return AssetSetAssetServiceClient::assetSetAssetName(
            $customerId,
            $assetSetId,
            $assetId
        );
    }

    /**
     * Generates a resource name of audience type.
     *
     * @param string $customerId
     * @param string $audienceId
     * @return string the audience resource name
     */
    public static function forAudience(
        $customerId,
        $audienceId
    ): string {
        return AudienceServiceClient::audienceName(
            $customerId,
            $audienceId
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
     * Generates a resource name of bidding data exclusion type.
     *
     * @param string $customerId
     * @param string $seasonalityEventId
     * @return string the bidding data exclusion resource name
     */
    public static function forBiddingDataExclusion(
        $customerId,
        $seasonalityEventId
    ): string {
        return BiddingDataExclusionServiceClient::biddingDataExclusionName(
            $customerId,
            $seasonalityEventId
        );
    }

    /**
     * Generates a resource name of bidding seasonality adjustment type.
     *
     * @param string $customerId
     * @param string $seasonalityEventId
     * @return string the bidding seasonality adjustment resource name
     */
    public static function forBiddingSeasonalityAdjustment(
        $customerId,
        $seasonalityEventId
    ): string {
        return BiddingSeasonalityAdjustmentServiceClient::biddingSeasonalityAdjustmentName(
            $customerId,
            $seasonalityEventId
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
     * Generates a resource name of campaign asset set type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $assetSetId
     * @return string the campaign asset set resource name
     */
    public static function forCampaignAssetSet(
        $customerId,
        $campaignId,
        $assetSetId
    ): string {
        return CampaignAssetSetServiceClient::campaignAssetSetName(
            $customerId,
            $campaignId,
            $assetSetId
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
     * Generates a resource name of campaign conversion goal type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $category
     * @param string $source
     * @return string the campaign conversion goal resource name
     */
    public static function forCampaignConversionGoal(
        $customerId,
        $campaignId,
        $category,
        $source
    ): string {
        return CampaignConversionGoalServiceClient::campaignConversionGoalName(
            $customerId,
            $campaignId,
            $category,
            $source
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
     * Generates a resource name of campaign customizer type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $customizerAttributeId
     * @return string the campaign customizer resource name
     */
    public static function forCampaignCustomizer(
        $customerId,
        $campaignId,
        $customizerAttributeId
    ): string {
        return CampaignCustomizerServiceClient::campaignCustomizerName(
            $customerId,
            $campaignId,
            $customizerAttributeId
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
     * Generates a resource name of campaign group type.
     *
     * @param string $customerId
     * @param string $campaignGroupId
     * @return string the campaign group resource name
     */
    public static function forCampaignGroup(
        $customerId,
        $campaignGroupId
    ): string {
        return CampaignGroupServiceClient::campaignGroupName(
            $customerId,
            $campaignGroupId
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
     * Generates a resource name of campaign lifecycle goal type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @return string the campaign lifecycle goal resource name
     */
    public static function forCampaignLifecycleGoal(
        $customerId,
        $campaignId
    ): string {
        return CampaignLifecycleGoalServiceClient::campaignLifecycleGoalName(
            $customerId,
            $campaignId
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
     * Generates a resource name of carrier constant type.
     *
     * @param string $criterionId
     * @return string the carrier constant resource name
     */
    public static function forCarrierConstant(
        $criterionId
    ): string {
        return BatchJobServiceClient::carrierConstantName(
            $criterionId
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
        return AdGroupCriterionServiceClient::combinedAudienceName(
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
     * Generates a resource name of conversion goal campaign config type.
     *
     * @param string $customerId
     * @param string $campaignId
     * @return string the conversion goal campaign config resource name
     */
    public static function forConversionGoalCampaignConfig(
        $customerId,
        $campaignId
    ): string {
        return ConversionGoalCampaignConfigServiceClient::conversionGoalCampaignConfigName(
            $customerId,
            $campaignId
        );
    }

    /**
     * Generates a resource name of conversion value rule type.
     *
     * @param string $customerId
     * @param string $conversionValueRuleId
     * @return string the conversion value rule resource name
     */
    public static function forConversionValueRule(
        $customerId,
        $conversionValueRuleId
    ): string {
        return ConversionValueRuleServiceClient::conversionValueRuleName(
            $customerId,
            $conversionValueRuleId
        );
    }

    /**
     * Generates a resource name of conversion value rule set type.
     *
     * @param string $customerId
     * @param string $conversionValueRuleSetId
     * @return string the conversion value rule set resource name
     */
    public static function forConversionValueRuleSet(
        $customerId,
        $conversionValueRuleSetId
    ): string {
        return ConversionValueRuleSetServiceClient::conversionValueRuleSetName(
            $customerId,
            $conversionValueRuleSetId
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
     * Generates a resource name of custom conversion goal type.
     *
     * @param string $customerId
     * @param string $goalId
     * @return string the custom conversion goal resource name
     */
    public static function forCustomConversionGoal(
        $customerId,
        $goalId
    ): string {
        return CustomConversionGoalServiceClient::customConversionGoalName(
            $customerId,
            $goalId
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
     * Generates a resource name of customer asset set type.
     *
     * @param string $customerId
     * @param string $assetSetId
     * @return string the customer asset set resource name
     */
    public static function forCustomerAssetSet(
        $customerId,
        $assetSetId
    ): string {
        return CustomerAssetSetServiceClient::customerAssetSetName(
            $customerId,
            $assetSetId
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
     * Generates a resource name of customer conversion goal type.
     *
     * @param string $customerId
     * @param string $category
     * @param string $source
     * @return string the customer conversion goal resource name
     */
    public static function forCustomerConversionGoal(
        $customerId,
        $category,
        $source
    ): string {
        return CustomerConversionGoalServiceClient::customerConversionGoalName(
            $customerId,
            $category,
            $source
        );
    }

    /**
     * Generates a resource name of customer customizer type.
     *
     * @param string $customerId
     * @param string $customizerAttributeId
     * @return string the customer customizer resource name
     */
    public static function forCustomerCustomizer(
        $customerId,
        $customizerAttributeId
    ): string {
        return CustomerCustomizerServiceClient::customerCustomizerName(
            $customerId,
            $customizerAttributeId
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
     * Generates a resource name of customer lifecycle goal type.
     *
     * @param string $customerId
     * @return string the customer lifecycle goal resource name
     */
    public static function forCustomerLifecycleGoal(
        $customerId
    ): string {
        return CustomerLifecycleGoalServiceClient::customerLifecycleGoalName(
            $customerId
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
     * Generates a resource name of customer sk ad network conversion value schema type.
     *
     * @param string $customerId
     * @param string $accountLinkId
     * @return string the customer sk ad network conversion value schema resource name
     */
    public static function forCustomerSkAdNetworkConversionValueSchema(
        $customerId,
        $accountLinkId
    ): string {
        return CustomerSkAdNetworkConversionValueSchemaServiceClient::customerSkAdNetworkConversionValueSchemaName(
            $customerId,
            $accountLinkId
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
     * Generates a resource name of customizer attribute type.
     *
     * @param string $customerId
     * @param string $customizerAttributeId
     * @return string the customizer attribute resource name
     */
    public static function forCustomizerAttribute(
        $customerId,
        $customizerAttributeId
    ): string {
        return CustomizerAttributeServiceClient::customizerAttributeName(
            $customerId,
            $customizerAttributeId
        );
    }

    /**
     * Generates a resource name of data link type.
     *
     * @param string $customerId
     * @param string $productLinkId
     * @param string $dataLinkId
     * @return string the data link resource name
     */
    public static function forDataLink(
        $customerId,
        $productLinkId,
        $dataLinkId
    ): string {
        return DataLinkServiceClient::dataLinkName(
            $customerId,
            $productLinkId,
            $dataLinkId
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
        return BatchJobServiceClient::detailedDemographicName(
            $customerId,
            $detailedDemographicId
        );
    }

    /**
     * Generates a resource name of experiment type.
     *
     * @param string $customerId
     * @param string $trialId
     * @return string the experiment resource name
     */
    public static function forExperiment(
        $customerId,
        $trialId
    ): string {
        return ExperimentServiceClient::experimentName(
            $customerId,
            $trialId
        );
    }

    /**
     * Generates a resource name of experiment arm type.
     *
     * @param string $customerId
     * @param string $trialId
     * @param string $trialArmId
     * @return string the experiment arm resource name
     */
    public static function forExperimentArm(
        $customerId,
        $trialId,
        $trialArmId
    ): string {
        return ExperimentArmServiceClient::experimentArmName(
            $customerId,
            $trialId,
            $trialArmId
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
        return BatchJobServiceClient::geoTargetConstantName(
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
        return BatchJobServiceClient::keywordThemeConstantName(
            $expressCategoryId,
            $expressSubCategoryId
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
     * Generates a resource name of language constant type.
     *
     * @param string $criterionId
     * @return string the language constant resource name
     */
    public static function forLanguageConstant(
        $criterionId
    ): string {
        return BatchJobServiceClient::languageConstantName(
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
        return BatchJobServiceClient::lifeEventName(
            $customerId,
            $lifeEventId
        );
    }

    /**
     * Generates a resource name of local services lead type.
     *
     * @param string $customerId
     * @param string $localServicesLeadId
     * @return string the local services lead resource name
     */
    public static function forLocalServicesLead(
        $customerId,
        $localServicesLeadId
    ): string {
        return LocalServicesLeadServiceClient::localServicesLeadName(
            $customerId,
            $localServicesLeadId
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
        return AdGroupCriterionServiceClient::mobileAppCategoryConstantName(
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
        return BatchJobServiceClient::mobileDeviceConstantName(
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
        return BatchJobServiceClient::operatingSystemVersionConstantName(
            $criterionId
        );
    }

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
        return BillingSetupServiceClient::paymentsAccountName(
            $customerId,
            $paymentsAccountId
        );
    }

    /**
     * Generates a resource name of product link type.
     *
     * @param string $customerId
     * @param string $productLinkId
     * @return string the product link resource name
     */
    public static function forProductLink(
        $customerId,
        $productLinkId
    ): string {
        return ProductLinkServiceClient::productLinkName(
            $customerId,
            $productLinkId
        );
    }

    /**
     * Generates a resource name of product link invitation type.
     *
     * @param string $customerId
     * @param string $customerInvitationId
     * @return string the product link invitation resource name
     */
    public static function forProductLinkInvitation(
        $customerId,
        $customerInvitationId
    ): string {
        return ProductLinkInvitationServiceClient::productLinkInvitationName(
            $customerId,
            $customerInvitationId
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
     * Generates a resource name of recommendation subscription type.
     *
     * @param string $customerId
     * @param string $recommendationType
     * @return string the recommendation subscription resource name
     */
    public static function forRecommendationSubscription(
        $customerId,
        $recommendationType
    ): string {
        return RecommendationSubscriptionServiceClient::recommendationSubscriptionName(
            $customerId,
            $recommendationType
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
        return AdGroupCriterionServiceClient::topicConstantName(
            $topicId
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
        return BatchJobServiceClient::userInterestName(
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
     * Generates a resource name of user list customer type type.
     *
     * @param string $customerId
     * @param string $userListId
     * @param string $semanticLabel
     * @return string the user list customer type resource name
     */
    public static function forUserListCustomerType(
        $customerId,
        $userListId,
        $semanticLabel
    ): string {
        return UserListCustomerTypeServiceClient::userListCustomerTypeName(
            $customerId,
            $userListId,
            $semanticLabel
        );
    }
}

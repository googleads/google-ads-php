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

namespace Google\Ads\GoogleAds\Util\V18;

use Google\Ads\GoogleAds\V18\Services\Client\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdParameterServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AudienceServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BatchJobServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerAssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerSkAdNetworkConversionValueSchemaServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\DataLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ExperimentServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\LabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\LocalServicesLeadServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ProductLinkInvitationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ProductLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\RecommendationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\RecommendationSubscriptionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SharedSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\UserListCustomerTypeServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\UserListServiceClient;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `ResourceNames`.
 *
 * @see ResourceNames
 * @small
 */
class ResourceNamesTest extends TestCase
{
    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAccessibleBiddingStrategy()
     */
    public function testGetNameForAccessibleBiddingStrategy()
    {
        $customerId = '111111';
        $biddingStrategyId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/accessibleBiddingStrategies/%s",
            $customerId,
            $biddingStrategyId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccessibleBiddingStrategy(
                $customerId,
                $biddingStrategyId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($biddingStrategyId, $names['bidding_strategy_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAccountBudget()
     */
    public function testGetNameForAccountBudget()
    {
        $customerId = '111111';
        $accountBudgetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/accountBudgets/%s",
            $customerId,
            $accountBudgetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccountBudget(
                $customerId,
                $accountBudgetId
            )
        );

        $names = AccountBudgetProposalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($accountBudgetId, $names['account_budget_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAccountBudgetProposal()
     */
    public function testGetNameForAccountBudgetProposal()
    {
        $customerId = '111111';
        $accountBudgetProposalId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/accountBudgetProposals/%s",
            $customerId,
            $accountBudgetProposalId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccountBudgetProposal(
                $customerId,
                $accountBudgetProposalId
            )
        );

        $names = AccountBudgetProposalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($accountBudgetProposalId, $names['account_budget_proposal_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAccountLink()
     */
    public function testGetNameForAccountLink()
    {
        $customerId = '111111';
        $accountLinkId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/accountLinks/%s",
            $customerId,
            $accountLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccountLink(
                $customerId,
                $accountLinkId
            )
        );

        $names = AccountLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($accountLinkId, $names['account_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAd()
     */
    public function testGetNameForAd()
    {
        $customerId = '111111';
        $adId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/ads/%s",
            $customerId,
            $adId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAd(
                $customerId,
                $adId
            )
        );

        $names = AdServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adId, $names['ad_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroup()
     */
    public function testGetNameForAdGroup()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/adGroups/%s",
            $customerId,
            $adGroupId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroup(
                $customerId,
                $adGroupId
            )
        );

        $names = AdGroupServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupAd()
     */
    public function testGetNameForAdGroupAd()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $adId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupAds/%s~%s",
            $customerId,
            $adGroupId,
            $adId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAd(
                $customerId,
                $adGroupId,
                $adId
            )
        );

        $names = AdGroupAdServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($adId, $names['ad_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupAdLabel()
     */
    public function testGetNameForAdGroupAdLabel()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $adId = '333333';
        $labelId = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupAdLabels/%s~%s~%s",
            $customerId,
            $adGroupId,
            $adId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAdLabel(
                $customerId,
                $adGroupId,
                $adId,
                $labelId
            )
        );

        $names = AdGroupAdLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($adId, $names['ad_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupAsset()
     */
    public function testGetNameForAdGroupAsset()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $assetId = '333333';
        $fieldType = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupAssets/%s~%s~%s",
            $customerId,
            $adGroupId,
            $assetId,
            $fieldType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAsset(
                $customerId,
                $adGroupId,
                $assetId,
                $fieldType
            )
        );

        $names = AdGroupAssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($assetId, $names['asset_id']);
        $this->assertEquals($fieldType, $names['field_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupAssetSet()
     */
    public function testGetNameForAdGroupAssetSet()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $assetSetId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupAssetSets/%s~%s",
            $customerId,
            $adGroupId,
            $assetSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAssetSet(
                $customerId,
                $adGroupId,
                $assetSetId
            )
        );

        $names = AdGroupAssetSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($assetSetId, $names['asset_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupBidModifier()
     */
    public function testGetNameForAdGroupBidModifier()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupBidModifiers/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupBidModifier(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );

        $names = AdGroupBidModifierServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupCriterion()
     */
    public function testGetNameForAdGroupCriterion()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupCriteria/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterion(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );

        $names = AdGroupCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupCriterionCustomizer()
     */
    public function testGetNameForAdGroupCriterionCustomizer()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $customizerAttributeId = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupCriterionCustomizers/%s~%s~%s",
            $customerId,
            $adGroupId,
            $criterionId,
            $customizerAttributeId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterionCustomizer(
                $customerId,
                $adGroupId,
                $criterionId,
                $customizerAttributeId
            )
        );

        $names = AdGroupCriterionCustomizerServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($customizerAttributeId, $names['customizer_attribute_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupCriterionLabel()
     */
    public function testGetNameForAdGroupCriterionLabel()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $labelId = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupCriterionLabels/%s~%s~%s",
            $customerId,
            $adGroupId,
            $criterionId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterionLabel(
                $customerId,
                $adGroupId,
                $criterionId,
                $labelId
            )
        );

        $names = AdGroupCriterionLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupCustomizer()
     */
    public function testGetNameForAdGroupCustomizer()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $customizerAttributeId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupCustomizers/%s~%s",
            $customerId,
            $adGroupId,
            $customizerAttributeId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCustomizer(
                $customerId,
                $adGroupId,
                $customizerAttributeId
            )
        );

        $names = AdGroupCustomizerServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($customizerAttributeId, $names['customizer_attribute_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupExtensionSetting()
     */
    public function testGetNameForAdGroupExtensionSetting()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $extensionType = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupExtensionSettings/%s~%s",
            $customerId,
            $adGroupId,
            $extensionType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupExtensionSetting(
                $customerId,
                $adGroupId,
                $extensionType
            )
        );

        $names = AdGroupExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($extensionType, $names['extension_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupFeed()
     */
    public function testGetNameForAdGroupFeed()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $feedId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupFeeds/%s~%s",
            $customerId,
            $adGroupId,
            $feedId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupFeed(
                $customerId,
                $adGroupId,
                $feedId
            )
        );

        $names = AdGroupFeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdGroupLabel()
     */
    public function testGetNameForAdGroupLabel()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $labelId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupLabels/%s~%s",
            $customerId,
            $adGroupId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupLabel(
                $customerId,
                $adGroupId,
                $labelId
            )
        );

        $names = AdGroupLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAdParameter()
     */
    public function testGetNameForAdParameter()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $parameterIndex = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/adParameters/%s~%s~%s",
            $customerId,
            $adGroupId,
            $criterionId,
            $parameterIndex
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdParameter(
                $customerId,
                $adGroupId,
                $criterionId,
                $parameterIndex
            )
        );

        $names = AdParameterServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($parameterIndex, $names['parameter_index']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAsset()
     */
    public function testGetNameForAsset()
    {
        $customerId = '111111';
        $assetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/assets/%s",
            $customerId,
            $assetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAsset(
                $customerId,
                $assetId
            )
        );

        $names = AssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetId, $names['asset_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAssetGroup()
     */
    public function testGetNameForAssetGroup()
    {
        $customerId = '111111';
        $assetGroupId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/assetGroups/%s",
            $customerId,
            $assetGroupId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetGroup(
                $customerId,
                $assetGroupId
            )
        );

        $names = AssetGroupServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetGroupId, $names['asset_group_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAssetGroupAsset()
     */
    public function testGetNameForAssetGroupAsset()
    {
        $customerId = '111111';
        $assetGroupId = '222222';
        $assetId = '333333';
        $fieldType = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/assetGroupAssets/%s~%s~%s",
            $customerId,
            $assetGroupId,
            $assetId,
            $fieldType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetGroupAsset(
                $customerId,
                $assetGroupId,
                $assetId,
                $fieldType
            )
        );

        $names = AssetGroupAssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetGroupId, $names['asset_group_id']);
        $this->assertEquals($assetId, $names['asset_id']);
        $this->assertEquals($fieldType, $names['field_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAssetGroupListingGroupFilter()
     */
    public function testGetNameForAssetGroupListingGroupFilter()
    {
        $customerId = '111111';
        $assetGroupId = '222222';
        $listingGroupFilterId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/assetGroupListingGroupFilters/%s~%s",
            $customerId,
            $assetGroupId,
            $listingGroupFilterId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetGroupListingGroupFilter(
                $customerId,
                $assetGroupId,
                $listingGroupFilterId
            )
        );

        $names = AssetGroupListingGroupFilterServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetGroupId, $names['asset_group_id']);
        $this->assertEquals($listingGroupFilterId, $names['listing_group_filter_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAssetGroupSignal()
     */
    public function testGetNameForAssetGroupSignal()
    {
        $customerId = '111111';
        $assetGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/assetGroupSignals/%s~%s",
            $customerId,
            $assetGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetGroupSignal(
                $customerId,
                $assetGroupId,
                $criterionId
            )
        );

        $names = AssetGroupSignalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetGroupId, $names['asset_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAssetSet()
     */
    public function testGetNameForAssetSet()
    {
        $customerId = '111111';
        $assetSetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/assetSets/%s",
            $customerId,
            $assetSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetSet(
                $customerId,
                $assetSetId
            )
        );

        $names = AssetSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetSetId, $names['asset_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAssetSetAsset()
     */
    public function testGetNameForAssetSetAsset()
    {
        $customerId = '111111';
        $assetSetId = '222222';
        $assetId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/assetSetAssets/%s~%s",
            $customerId,
            $assetSetId,
            $assetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetSetAsset(
                $customerId,
                $assetSetId,
                $assetId
            )
        );

        $names = AssetSetAssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetSetId, $names['asset_set_id']);
        $this->assertEquals($assetId, $names['asset_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forAudience()
     */
    public function testGetNameForAudience()
    {
        $customerId = '111111';
        $audienceId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/audiences/%s",
            $customerId,
            $audienceId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAudience(
                $customerId,
                $audienceId
            )
        );

        $names = AudienceServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($audienceId, $names['audience_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forBatchJob()
     */
    public function testGetNameForBatchJob()
    {
        $customerId = '111111';
        $batchJobId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/batchJobs/%s",
            $customerId,
            $batchJobId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBatchJob(
                $customerId,
                $batchJobId
            )
        );

        $names = BatchJobServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($batchJobId, $names['batch_job_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forBiddingDataExclusion()
     */
    public function testGetNameForBiddingDataExclusion()
    {
        $customerId = '111111';
        $seasonalityEventId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/biddingDataExclusions/%s",
            $customerId,
            $seasonalityEventId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBiddingDataExclusion(
                $customerId,
                $seasonalityEventId
            )
        );

        $names = BiddingDataExclusionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($seasonalityEventId, $names['seasonality_event_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forBiddingSeasonalityAdjustment()
     */
    public function testGetNameForBiddingSeasonalityAdjustment()
    {
        $customerId = '111111';
        $seasonalityEventId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/biddingSeasonalityAdjustments/%s",
            $customerId,
            $seasonalityEventId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBiddingSeasonalityAdjustment(
                $customerId,
                $seasonalityEventId
            )
        );

        $names = BiddingSeasonalityAdjustmentServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($seasonalityEventId, $names['seasonality_event_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forBiddingStrategy()
     */
    public function testGetNameForBiddingStrategy()
    {
        $customerId = '111111';
        $biddingStrategyId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/biddingStrategies/%s",
            $customerId,
            $biddingStrategyId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBiddingStrategy(
                $customerId,
                $biddingStrategyId
            )
        );

        $names = BiddingStrategyServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($biddingStrategyId, $names['bidding_strategy_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forBillingSetup()
     */
    public function testGetNameForBillingSetup()
    {
        $customerId = '111111';
        $billingSetupId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/billingSetups/%s",
            $customerId,
            $billingSetupId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBillingSetup(
                $customerId,
                $billingSetupId
            )
        );

        $names = BillingSetupServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($billingSetupId, $names['billing_setup_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaign()
     */
    public function testGetNameForCampaign()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/campaigns/%s",
            $customerId,
            $campaignId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaign(
                $customerId,
                $campaignId
            )
        );

        $names = CampaignServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignAsset()
     */
    public function testGetNameForCampaignAsset()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $assetId = '333333';
        $fieldType = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/campaignAssets/%s~%s~%s",
            $customerId,
            $campaignId,
            $assetId,
            $fieldType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignAsset(
                $customerId,
                $campaignId,
                $assetId,
                $fieldType
            )
        );

        $names = CampaignAssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($assetId, $names['asset_id']);
        $this->assertEquals($fieldType, $names['field_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignAssetSet()
     */
    public function testGetNameForCampaignAssetSet()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $assetSetId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignAssetSets/%s~%s",
            $customerId,
            $campaignId,
            $assetSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignAssetSet(
                $customerId,
                $campaignId,
                $assetSetId
            )
        );

        $names = CampaignAssetSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($assetSetId, $names['asset_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignBidModifier()
     */
    public function testGetNameForCampaignBidModifier()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignBidModifiers/%s~%s",
            $customerId,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignBidModifier(
                $customerId,
                $campaignId,
                $criterionId
            )
        );

        $names = CampaignBidModifierServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignBudget()
     */
    public function testGetNameForCampaignBudget()
    {
        $customerId = '111111';
        $campaignBudgetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/campaignBudgets/%s",
            $customerId,
            $campaignBudgetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignBudget(
                $customerId,
                $campaignBudgetId
            )
        );

        $names = CampaignBudgetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignBudgetId, $names['campaign_budget_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignConversionGoal()
     */
    public function testGetNameForCampaignConversionGoal()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $category = '333333';
        $source = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/campaignConversionGoals/%s~%s~%s",
            $customerId,
            $campaignId,
            $category,
            $source
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignConversionGoal(
                $customerId,
                $campaignId,
                $category,
                $source
            )
        );

        $names = CampaignConversionGoalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($category, $names['category']);
        $this->assertEquals($source, $names['source']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignCriterion()
     */
    public function testGetNameForCampaignCriterion()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignCriteria/%s~%s",
            $customerId,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignCriterion(
                $customerId,
                $campaignId,
                $criterionId
            )
        );

        $names = CampaignCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignCustomizer()
     */
    public function testGetNameForCampaignCustomizer()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $customizerAttributeId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignCustomizers/%s~%s",
            $customerId,
            $campaignId,
            $customizerAttributeId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignCustomizer(
                $customerId,
                $campaignId,
                $customizerAttributeId
            )
        );

        $names = CampaignCustomizerServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($customizerAttributeId, $names['customizer_attribute_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignDraft()
     */
    public function testGetNameForCampaignDraft()
    {
        $customerId = '111111';
        $baseCampaignId = '222222';
        $draftId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignDrafts/%s~%s",
            $customerId,
            $baseCampaignId,
            $draftId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignDraft(
                $customerId,
                $baseCampaignId,
                $draftId
            )
        );

        $names = CampaignDraftServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($baseCampaignId, $names['base_campaign_id']);
        $this->assertEquals($draftId, $names['draft_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignExtensionSetting()
     */
    public function testGetNameForCampaignExtensionSetting()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $extensionType = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignExtensionSettings/%s~%s",
            $customerId,
            $campaignId,
            $extensionType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignExtensionSetting(
                $customerId,
                $campaignId,
                $extensionType
            )
        );

        $names = CampaignExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($extensionType, $names['extension_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignFeed()
     */
    public function testGetNameForCampaignFeed()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $feedId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignFeeds/%s~%s",
            $customerId,
            $campaignId,
            $feedId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignFeed(
                $customerId,
                $campaignId,
                $feedId
            )
        );

        $names = CampaignFeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignGroup()
     */
    public function testGetNameForCampaignGroup()
    {
        $customerId = '111111';
        $campaignGroupId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/campaignGroups/%s",
            $customerId,
            $campaignGroupId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignGroup(
                $customerId,
                $campaignGroupId
            )
        );

        $names = CampaignGroupServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignGroupId, $names['campaign_group_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignLabel()
     */
    public function testGetNameForCampaignLabel()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $labelId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignLabels/%s~%s",
            $customerId,
            $campaignId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignLabel(
                $customerId,
                $campaignId,
                $labelId
            )
        );

        $names = CampaignLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignLifecycleGoal()
     */
    public function testGetNameForCampaignLifecycleGoal()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/campaignLifecycleGoals/%s",
            $customerId,
            $campaignId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignLifecycleGoal(
                $customerId,
                $campaignId
            )
        );

        $names = CampaignLifecycleGoalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCampaignSharedSet()
     */
    public function testGetNameForCampaignSharedSet()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $sharedSetId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignSharedSets/%s~%s",
            $customerId,
            $campaignId,
            $sharedSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignSharedSet(
                $customerId,
                $campaignId,
                $sharedSetId
            )
        );

        $names = CampaignSharedSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($sharedSetId, $names['shared_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCarrierConstant()
     */
    public function testGetNameForCarrierConstant()
    {
        $criterionId = '111111';
        $expectedResourceName = sprintf(
            "carrierConstants/%s",
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCarrierConstant(
                $criterionId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCombinedAudience()
     */
    public function testGetNameForCombinedAudience()
    {
        $customerId = '111111';
        $combinedAudienceId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/combinedAudiences/%s",
            $customerId,
            $combinedAudienceId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCombinedAudience(
                $customerId,
                $combinedAudienceId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($combinedAudienceId, $names['combined_audience_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forConversionAction()
     */
    public function testGetNameForConversionAction()
    {
        $customerId = '111111';
        $conversionActionId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/conversionActions/%s",
            $customerId,
            $conversionActionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forConversionAction(
                $customerId,
                $conversionActionId
            )
        );

        $names = ConversionActionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($conversionActionId, $names['conversion_action_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forConversionCustomVariable()
     */
    public function testGetNameForConversionCustomVariable()
    {
        $customerId = '111111';
        $conversionCustomVariableId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/conversionCustomVariables/%s",
            $customerId,
            $conversionCustomVariableId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forConversionCustomVariable(
                $customerId,
                $conversionCustomVariableId
            )
        );

        $names = ConversionCustomVariableServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($conversionCustomVariableId, $names['conversion_custom_variable_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forConversionGoalCampaignConfig()
     */
    public function testGetNameForConversionGoalCampaignConfig()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/conversionGoalCampaignConfigs/%s",
            $customerId,
            $campaignId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forConversionGoalCampaignConfig(
                $customerId,
                $campaignId
            )
        );

        $names = ConversionGoalCampaignConfigServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forConversionValueRule()
     */
    public function testGetNameForConversionValueRule()
    {
        $customerId = '111111';
        $conversionValueRuleId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/conversionValueRules/%s",
            $customerId,
            $conversionValueRuleId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forConversionValueRule(
                $customerId,
                $conversionValueRuleId
            )
        );

        $names = ConversionValueRuleServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($conversionValueRuleId, $names['conversion_value_rule_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forConversionValueRuleSet()
     */
    public function testGetNameForConversionValueRuleSet()
    {
        $customerId = '111111';
        $conversionValueRuleSetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/conversionValueRuleSets/%s",
            $customerId,
            $conversionValueRuleSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forConversionValueRuleSet(
                $customerId,
                $conversionValueRuleSetId
            )
        );

        $names = ConversionValueRuleSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($conversionValueRuleSetId, $names['conversion_value_rule_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomAudience()
     */
    public function testGetNameForCustomAudience()
    {
        $customerId = '111111';
        $customAudienceId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customAudiences/%s",
            $customerId,
            $customAudienceId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomAudience(
                $customerId,
                $customAudienceId
            )
        );

        $names = CustomAudienceServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($customAudienceId, $names['custom_audience_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomConversionGoal()
     */
    public function testGetNameForCustomConversionGoal()
    {
        $customerId = '111111';
        $goalId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customConversionGoals/%s",
            $customerId,
            $goalId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomConversionGoal(
                $customerId,
                $goalId
            )
        );

        $names = CustomConversionGoalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($goalId, $names['goal_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomer()
     */
    public function testGetNameForCustomer()
    {
        $customerId = '111111';
        $expectedResourceName = sprintf(
            "customers/%s",
            $customerId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomer(
                $customerId
            )
        );

        $names = CustomerServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerAsset()
     */
    public function testGetNameForCustomerAsset()
    {
        $customerId = '111111';
        $assetId = '222222';
        $fieldType = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/customerAssets/%s~%s",
            $customerId,
            $assetId,
            $fieldType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerAsset(
                $customerId,
                $assetId,
                $fieldType
            )
        );

        $names = CustomerAssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetId, $names['asset_id']);
        $this->assertEquals($fieldType, $names['field_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerAssetSet()
     */
    public function testGetNameForCustomerAssetSet()
    {
        $customerId = '111111';
        $assetSetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerAssetSets/%s",
            $customerId,
            $assetSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerAssetSet(
                $customerId,
                $assetSetId
            )
        );

        $names = CustomerAssetSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($assetSetId, $names['asset_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerClientLink()
     */
    public function testGetNameForCustomerClientLink()
    {
        $customerId = '111111';
        $clientCustomerId = '222222';
        $managerLinkId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/customerClientLinks/%s~%s",
            $customerId,
            $clientCustomerId,
            $managerLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerClientLink(
                $customerId,
                $clientCustomerId,
                $managerLinkId
            )
        );

        $names = CustomerClientLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($clientCustomerId, $names['client_customer_id']);
        $this->assertEquals($managerLinkId, $names['manager_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerConversionGoal()
     */
    public function testGetNameForCustomerConversionGoal()
    {
        $customerId = '111111';
        $category = '222222';
        $source = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/customerConversionGoals/%s~%s",
            $customerId,
            $category,
            $source
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerConversionGoal(
                $customerId,
                $category,
                $source
            )
        );

        $names = CustomerConversionGoalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($category, $names['category']);
        $this->assertEquals($source, $names['source']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerCustomizer()
     */
    public function testGetNameForCustomerCustomizer()
    {
        $customerId = '111111';
        $customizerAttributeId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerCustomizers/%s",
            $customerId,
            $customizerAttributeId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerCustomizer(
                $customerId,
                $customizerAttributeId
            )
        );

        $names = CustomerCustomizerServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($customizerAttributeId, $names['customizer_attribute_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerExtensionSetting()
     */
    public function testGetNameForCustomerExtensionSetting()
    {
        $customerId = '111111';
        $extensionType = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerExtensionSettings/%s",
            $customerId,
            $extensionType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerExtensionSetting(
                $customerId,
                $extensionType
            )
        );

        $names = CustomerExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($extensionType, $names['extension_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerFeed()
     */
    public function testGetNameForCustomerFeed()
    {
        $customerId = '111111';
        $feedId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerFeeds/%s",
            $customerId,
            $feedId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerFeed(
                $customerId,
                $feedId
            )
        );

        $names = CustomerFeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerLabel()
     */
    public function testGetNameForCustomerLabel()
    {
        $customerId = '111111';
        $labelId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerLabels/%s",
            $customerId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerLabel(
                $customerId,
                $labelId
            )
        );

        $names = CustomerLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerLifecycleGoal()
     */
    public function testGetNameForCustomerLifecycleGoal()
    {
        $customerId = '111111';
        $expectedResourceName = sprintf(
            "customers/%s/customerLifecycleGoals",
            $customerId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerLifecycleGoal(
                $customerId
            )
        );

        $names = CustomerLifecycleGoalServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerManagerLink()
     */
    public function testGetNameForCustomerManagerLink()
    {
        $customerId = '111111';
        $managerCustomerId = '222222';
        $managerLinkId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/customerManagerLinks/%s~%s",
            $customerId,
            $managerCustomerId,
            $managerLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerManagerLink(
                $customerId,
                $managerCustomerId,
                $managerLinkId
            )
        );

        $names = CustomerManagerLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($managerCustomerId, $names['manager_customer_id']);
        $this->assertEquals($managerLinkId, $names['manager_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerNegativeCriterion()
     */
    public function testGetNameForCustomerNegativeCriterion()
    {
        $customerId = '111111';
        $criterionId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerNegativeCriteria/%s",
            $customerId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerNegativeCriterion(
                $customerId,
                $criterionId
            )
        );

        $names = CustomerNegativeCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerSkAdNetworkConversionValueSchema()
     */
    public function testGetNameForCustomerSkAdNetworkConversionValueSchema()
    {
        $customerId = '111111';
        $accountLinkId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerSkAdNetworkConversionValueSchemas/%s",
            $customerId,
            $accountLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerSkAdNetworkConversionValueSchema(
                $customerId,
                $accountLinkId
            )
        );

        $names = CustomerSkAdNetworkConversionValueSchemaServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($accountLinkId, $names['account_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerUserAccess()
     */
    public function testGetNameForCustomerUserAccess()
    {
        $customerId = '111111';
        $userId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerUserAccesses/%s",
            $customerId,
            $userId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerUserAccess(
                $customerId,
                $userId
            )
        );

        $names = CustomerUserAccessServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($userId, $names['user_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomerUserAccessInvitation()
     */
    public function testGetNameForCustomerUserAccessInvitation()
    {
        $customerId = '111111';
        $invitationId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerUserAccessInvitations/%s",
            $customerId,
            $invitationId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerUserAccessInvitation(
                $customerId,
                $invitationId
            )
        );

        $names = CustomerUserAccessInvitationServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($invitationId, $names['invitation_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomInterest()
     */
    public function testGetNameForCustomInterest()
    {
        $customerId = '111111';
        $customInterestId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customInterests/%s",
            $customerId,
            $customInterestId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomInterest(
                $customerId,
                $customInterestId
            )
        );

        $names = CustomInterestServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($customInterestId, $names['custom_interest_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forCustomizerAttribute()
     */
    public function testGetNameForCustomizerAttribute()
    {
        $customerId = '111111';
        $customizerAttributeId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customizerAttributes/%s",
            $customerId,
            $customizerAttributeId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomizerAttribute(
                $customerId,
                $customizerAttributeId
            )
        );

        $names = CustomizerAttributeServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($customizerAttributeId, $names['customizer_attribute_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forDataLink()
     */
    public function testGetNameForDataLink()
    {
        $customerId = '111111';
        $productLinkId = '222222';
        $dataLinkId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/dataLinks/%s~%s",
            $customerId,
            $productLinkId,
            $dataLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDataLink(
                $customerId,
                $productLinkId,
                $dataLinkId
            )
        );

        $names = DataLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($productLinkId, $names['product_link_id']);
        $this->assertEquals($dataLinkId, $names['data_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forDetailedDemographic()
     */
    public function testGetNameForDetailedDemographic()
    {
        $customerId = '111111';
        $detailedDemographicId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/detailedDemographics/%s",
            $customerId,
            $detailedDemographicId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDetailedDemographic(
                $customerId,
                $detailedDemographicId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($detailedDemographicId, $names['detailed_demographic_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forExperiment()
     */
    public function testGetNameForExperiment()
    {
        $customerId = '111111';
        $trialId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/experiments/%s",
            $customerId,
            $trialId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forExperiment(
                $customerId,
                $trialId
            )
        );

        $names = ExperimentServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($trialId, $names['trial_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forExperimentArm()
     */
    public function testGetNameForExperimentArm()
    {
        $customerId = '111111';
        $trialId = '222222';
        $trialArmId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/experimentArms/%s~%s",
            $customerId,
            $trialId,
            $trialArmId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forExperimentArm(
                $customerId,
                $trialId,
                $trialArmId
            )
        );

        $names = ExperimentArmServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($trialId, $names['trial_id']);
        $this->assertEquals($trialArmId, $names['trial_arm_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forExtensionFeedItem()
     */
    public function testGetNameForExtensionFeedItem()
    {
        $customerId = '111111';
        $feedItemId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/extensionFeedItems/%s",
            $customerId,
            $feedItemId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forExtensionFeedItem(
                $customerId,
                $feedItemId
            )
        );

        $names = ExtensionFeedItemServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forFeed()
     */
    public function testGetNameForFeed()
    {
        $customerId = '111111';
        $feedId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/feeds/%s",
            $customerId,
            $feedId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeed(
                $customerId,
                $feedId
            )
        );

        $names = FeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forFeedItem()
     */
    public function testGetNameForFeedItem()
    {
        $customerId = '111111';
        $feedId = '222222';
        $feedItemId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/feedItems/%s~%s",
            $customerId,
            $feedId,
            $feedItemId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedItem(
                $customerId,
                $feedId,
                $feedItemId
            )
        );

        $names = FeedItemServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forFeedItemSet()
     */
    public function testGetNameForFeedItemSet()
    {
        $customerId = '111111';
        $feedId = '222222';
        $feedItemSetId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/feedItemSets/%s~%s",
            $customerId,
            $feedId,
            $feedItemSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedItemSet(
                $customerId,
                $feedId,
                $feedItemSetId
            )
        );

        $names = FeedItemSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedItemSetId, $names['feed_item_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forFeedItemSetLink()
     */
    public function testGetNameForFeedItemSetLink()
    {
        $customerId = '111111';
        $feedId = '222222';
        $feedItemSetId = '333333';
        $feedItemId = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/feedItemSetLinks/%s~%s~%s",
            $customerId,
            $feedId,
            $feedItemSetId,
            $feedItemId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedItemSetLink(
                $customerId,
                $feedId,
                $feedItemSetId,
                $feedItemId
            )
        );

        $names = FeedItemSetLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedItemSetId, $names['feed_item_set_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forFeedItemTarget()
     */
    public function testGetNameForFeedItemTarget()
    {
        $customerId = '111111';
        $feedId = '222222';
        $feedItemId = '333333';
        $feedItemTargetType = '444444';
        $feedItemTargetId = '555555';
        $expectedResourceName = sprintf(
            "customers/%s/feedItemTargets/%s~%s~%s~%s",
            $customerId,
            $feedId,
            $feedItemId,
            $feedItemTargetType,
            $feedItemTargetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedItemTarget(
                $customerId,
                $feedId,
                $feedItemId,
                $feedItemTargetType,
                $feedItemTargetId
            )
        );

        $names = FeedItemTargetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
        $this->assertEquals($feedItemTargetType, $names['feed_item_target_type']);
        $this->assertEquals($feedItemTargetId, $names['feed_item_target_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forFeedMapping()
     */
    public function testGetNameForFeedMapping()
    {
        $customerId = '111111';
        $feedId = '222222';
        $feedMappingId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/feedMappings/%s~%s",
            $customerId,
            $feedId,
            $feedMappingId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedMapping(
                $customerId,
                $feedId,
                $feedMappingId
            )
        );

        $names = FeedMappingServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedMappingId, $names['feed_mapping_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forGeoTargetConstant()
     */
    public function testGetNameForGeoTargetConstant()
    {
        $criterionId = '111111';
        $expectedResourceName = sprintf(
            "geoTargetConstants/%s",
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGeoTargetConstant(
                $criterionId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forGoogleAdsField()
     */
    public function testGetNameForGoogleAdsField()
    {
        $googleAdsField = '111111';
        $expectedResourceName = sprintf(
            "googleAdsFields/%s",
            $googleAdsField
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGoogleAdsField(
                $googleAdsField
            )
        );

        $names = GoogleAdsFieldServiceClient::parseName($expectedResourceName);
        $this->assertEquals($googleAdsField, $names['google_ads_field']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forKeywordPlan()
     */
    public function testGetNameForKeywordPlan()
    {
        $customerId = '111111';
        $keywordPlanId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/keywordPlans/%s",
            $customerId,
            $keywordPlanId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlan(
                $customerId,
                $keywordPlanId
            )
        );

        $names = KeywordPlanServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($keywordPlanId, $names['keyword_plan_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forKeywordPlanAdGroup()
     */
    public function testGetNameForKeywordPlanAdGroup()
    {
        $customerId = '111111';
        $keywordPlanAdGroupId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/keywordPlanAdGroups/%s",
            $customerId,
            $keywordPlanAdGroupId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanAdGroup(
                $customerId,
                $keywordPlanAdGroupId
            )
        );

        $names = KeywordPlanAdGroupServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($keywordPlanAdGroupId, $names['keyword_plan_ad_group_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forKeywordPlanAdGroupKeyword()
     */
    public function testGetNameForKeywordPlanAdGroupKeyword()
    {
        $customerId = '111111';
        $keywordPlanAdGroupKeywordId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/keywordPlanAdGroupKeywords/%s",
            $customerId,
            $keywordPlanAdGroupKeywordId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanAdGroupKeyword(
                $customerId,
                $keywordPlanAdGroupKeywordId
            )
        );

        $names = KeywordPlanAdGroupKeywordServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($keywordPlanAdGroupKeywordId, $names['keyword_plan_ad_group_keyword_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forKeywordPlanCampaign()
     */
    public function testGetNameForKeywordPlanCampaign()
    {
        $customerId = '111111';
        $keywordPlanCampaignId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/keywordPlanCampaigns/%s",
            $customerId,
            $keywordPlanCampaignId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanCampaign(
                $customerId,
                $keywordPlanCampaignId
            )
        );

        $names = KeywordPlanCampaignServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($keywordPlanCampaignId, $names['keyword_plan_campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forKeywordPlanCampaignKeyword()
     */
    public function testGetNameForKeywordPlanCampaignKeyword()
    {
        $customerId = '111111';
        $keywordPlanCampaignKeywordId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/keywordPlanCampaignKeywords/%s",
            $customerId,
            $keywordPlanCampaignKeywordId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanCampaignKeyword(
                $customerId,
                $keywordPlanCampaignKeywordId
            )
        );

        $names = KeywordPlanCampaignKeywordServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($keywordPlanCampaignKeywordId, $names['keyword_plan_campaign_keyword_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forKeywordThemeConstant()
     */
    public function testGetNameForKeywordThemeConstant()
    {
        $expressCategoryId = '111111';
        $expressSubCategoryId = '222222';
        $expectedResourceName = sprintf(
            "keywordThemeConstants/%s~%s",
            $expressCategoryId,
            $expressSubCategoryId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordThemeConstant(
                $expressCategoryId,
                $expressSubCategoryId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($expressCategoryId, $names['express_category_id']);
        $this->assertEquals($expressSubCategoryId, $names['express_sub_category_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forLabel()
     */
    public function testGetNameForLabel()
    {
        $customerId = '111111';
        $labelId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/labels/%s",
            $customerId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLabel(
                $customerId,
                $labelId
            )
        );

        $names = LabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forLanguageConstant()
     */
    public function testGetNameForLanguageConstant()
    {
        $criterionId = '111111';
        $expectedResourceName = sprintf(
            "languageConstants/%s",
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLanguageConstant(
                $criterionId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forLifeEvent()
     */
    public function testGetNameForLifeEvent()
    {
        $customerId = '111111';
        $lifeEventId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/lifeEvents/%s",
            $customerId,
            $lifeEventId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLifeEvent(
                $customerId,
                $lifeEventId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($lifeEventId, $names['life_event_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forLocalServicesLead()
     */
    public function testGetNameForLocalServicesLead()
    {
        $customerId = '111111';
        $localServicesLeadId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/localServicesLeads/%s",
            $customerId,
            $localServicesLeadId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLocalServicesLead(
                $customerId,
                $localServicesLeadId
            )
        );

        $names = LocalServicesLeadServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($localServicesLeadId, $names['local_services_lead_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forMobileAppCategoryConstant()
     */
    public function testGetNameForMobileAppCategoryConstant()
    {
        $mobileAppCategoryId = '111111';
        $expectedResourceName = sprintf(
            "mobileAppCategoryConstants/%s",
            $mobileAppCategoryId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMobileAppCategoryConstant(
                $mobileAppCategoryId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($mobileAppCategoryId, $names['mobile_app_category_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forMobileDeviceConstant()
     */
    public function testGetNameForMobileDeviceConstant()
    {
        $criterionId = '111111';
        $expectedResourceName = sprintf(
            "mobileDeviceConstants/%s",
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMobileDeviceConstant(
                $criterionId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forOfflineUserDataJob()
     */
    public function testGetNameForOfflineUserDataJob()
    {
        $customerId = '111111';
        $offlineUserDataUpdateId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/offlineUserDataJobs/%s",
            $customerId,
            $offlineUserDataUpdateId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forOfflineUserDataJob(
                $customerId,
                $offlineUserDataUpdateId
            )
        );

        $names = OfflineUserDataJobServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($offlineUserDataUpdateId, $names['offline_user_data_update_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forOperatingSystemVersionConstant()
     */
    public function testGetNameForOperatingSystemVersionConstant()
    {
        $criterionId = '111111';
        $expectedResourceName = sprintf(
            "operatingSystemVersionConstants/%s",
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forOperatingSystemVersionConstant(
                $criterionId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forPaymentsAccount()
     */
    public function testGetNameForPaymentsAccount()
    {
        $customerId = '111111';
        $paymentsAccountId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/paymentsAccounts/%s",
            $customerId,
            $paymentsAccountId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forPaymentsAccount(
                $customerId,
                $paymentsAccountId
            )
        );

        $names = BillingSetupServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($paymentsAccountId, $names['payments_account_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forProductLink()
     */
    public function testGetNameForProductLink()
    {
        $customerId = '111111';
        $productLinkId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/productLinks/%s",
            $customerId,
            $productLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forProductLink(
                $customerId,
                $productLinkId
            )
        );

        $names = ProductLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($productLinkId, $names['product_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forProductLinkInvitation()
     */
    public function testGetNameForProductLinkInvitation()
    {
        $customerId = '111111';
        $customerInvitationId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/productLinkInvitations/%s",
            $customerId,
            $customerInvitationId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forProductLinkInvitation(
                $customerId,
                $customerInvitationId
            )
        );

        $names = ProductLinkInvitationServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($customerInvitationId, $names['customer_invitation_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forRecommendation()
     */
    public function testGetNameForRecommendation()
    {
        $customerId = '111111';
        $recommendationId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/recommendations/%s",
            $customerId,
            $recommendationId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forRecommendation(
                $customerId,
                $recommendationId
            )
        );

        $names = RecommendationServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($recommendationId, $names['recommendation_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forRecommendationSubscription()
     */
    public function testGetNameForRecommendationSubscription()
    {
        $customerId = '111111';
        $recommendationType = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/recommendationSubscriptions/%s",
            $customerId,
            $recommendationType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forRecommendationSubscription(
                $customerId,
                $recommendationType
            )
        );

        $names = RecommendationSubscriptionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($recommendationType, $names['recommendation_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forRemarketingAction()
     */
    public function testGetNameForRemarketingAction()
    {
        $customerId = '111111';
        $remarketingActionId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/remarketingActions/%s",
            $customerId,
            $remarketingActionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forRemarketingAction(
                $customerId,
                $remarketingActionId
            )
        );

        $names = RemarketingActionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($remarketingActionId, $names['remarketing_action_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forSharedCriterion()
     */
    public function testGetNameForSharedCriterion()
    {
        $customerId = '111111';
        $sharedSetId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/sharedCriteria/%s~%s",
            $customerId,
            $sharedSetId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSharedCriterion(
                $customerId,
                $sharedSetId,
                $criterionId
            )
        );

        $names = SharedCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($sharedSetId, $names['shared_set_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forSharedSet()
     */
    public function testGetNameForSharedSet()
    {
        $customerId = '111111';
        $sharedSetId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/sharedSets/%s",
            $customerId,
            $sharedSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSharedSet(
                $customerId,
                $sharedSetId
            )
        );

        $names = SharedSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($sharedSetId, $names['shared_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forSmartCampaignSetting()
     */
    public function testGetNameForSmartCampaignSetting()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/smartCampaignSettings/%s",
            $customerId,
            $campaignId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSmartCampaignSetting(
                $customerId,
                $campaignId
            )
        );

        $names = SmartCampaignSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forThirdPartyAppAnalyticsLink()
     */
    public function testGetNameForThirdPartyAppAnalyticsLink()
    {
        $customerId = '111111';
        $customerLinkId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/thirdPartyAppAnalyticsLinks/%s",
            $customerId,
            $customerLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forThirdPartyAppAnalyticsLink(
                $customerId,
                $customerLinkId
            )
        );

        $names = ThirdPartyAppAnalyticsLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($customerLinkId, $names['customer_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forTopicConstant()
     */
    public function testGetNameForTopicConstant()
    {
        $topicId = '111111';
        $expectedResourceName = sprintf(
            "topicConstants/%s",
            $topicId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forTopicConstant(
                $topicId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($topicId, $names['topic_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forUserInterest()
     */
    public function testGetNameForUserInterest()
    {
        $customerId = '111111';
        $userInterestId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/userInterests/%s",
            $customerId,
            $userInterestId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forUserInterest(
                $customerId,
                $userInterestId
            )
        );

        $names = GoogleAdsServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($userInterestId, $names['user_interest_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forUserList()
     */
    public function testGetNameForUserList()
    {
        $customerId = '111111';
        $userListId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/userLists/%s",
            $customerId,
            $userListId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forUserList(
                $customerId,
                $userListId
            )
        );

        $names = UserListServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($userListId, $names['user_list_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V18\ResourceNames::forUserListCustomerType()
     */
    public function testGetNameForUserListCustomerType()
    {
        $customerId = '111111';
        $userListId = '222222';
        $semanticLabel = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/userListCustomerTypes/%s~%s",
            $customerId,
            $userListId,
            $semanticLabel
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forUserListCustomerType(
                $customerId,
                $userListId,
                $semanticLabel
            )
        );

        $names = UserListCustomerTypeServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($userListId, $names['user_list_id']);
        $this->assertEquals($semanticLabel, $names['semantic_label']);
    }
}

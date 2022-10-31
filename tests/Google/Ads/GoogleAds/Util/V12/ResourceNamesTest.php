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

namespace Google\Ads\GoogleAds\Util\V12;

use Google\Ads\GoogleAds\V12\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V12\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V12\Services\AdServiceClient;
use Google\Ads\GoogleAds\V12\Services\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V12\Services\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V12\Services\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V12\Services\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V12\Services\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V12\Services\AssetSetServiceClient;
use Google\Ads\GoogleAds\V12\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V12\Services\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V12\Services\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V12\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V12\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V12\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V12\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V12\Services\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V12\Services\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V12\Services\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V12\Services\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V12\Services\ExperimentServiceClient;
use Google\Ads\GoogleAds\V12\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V12\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V12\Services\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V12\Services\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V12\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V12\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V12\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V12\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V12\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V12\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V12\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V12\Services\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V12\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V12\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V12\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V12\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V12\Services\UserListServiceClient;
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerAssetSet()
     */
    public function testGetNameForCustomerAssetSet()
    {
        $customerId = '111111';
        $assetSetId = '222222';
        $expectedResourceName = sprintf(
            'customers/%s/customerAssetSets/%s',
            $customerId,
            $assetSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerAssetSet($customerId, $assetSetId)
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupAssetSet()
     */
    public function testGetNameForAdGroupAssetSet()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $assetSetId = '333333';
        $expectedResourceName = sprintf(
            'customers/%s/adGroupAssetSets/%s~%s',
            $customerId,
            $adGroupId,
            $assetSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAssetSet($customerId, $adGroupId, $assetSetId)
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignGroup()
     */
    public function testGetNameForCampaignGroup()
    {
        $customerId = '111111';
        $campaignGroupId = '222222';
        $expectedResourceName = sprintf(
            'customers/%s/campaignGroups/%s',
            $customerId,
            $campaignGroupId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignGroup($customerId, $campaignGroupId)
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forLeadFormSubmissionData()
     */
    public function testGetNameForLeadFormSubmissionData()
    {
        $customerId = '111111';
        $leadFormSubmissionDataId = '222222';
        $expectedResourceName = sprintf(
            'customers/%s/leadFormSubmissionData/%s',
            $customerId,
            $leadFormSubmissionDataId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLeadFormSubmissionData($customerId, $leadFormSubmissionDataId)
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAudience()
     */
    public function testGetNameForAudience()
    {
        $customerId = '111111';
        $audienceId = '222222';
        $expectedResourceName = sprintf('customers/%s/audiences/%s', $customerId, $audienceId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAudience($customerId, $audienceId)
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignConversionGoal()
     */
    public function testGetNameForCampaignConversionGoal()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $category = '333333';
        $origin = '444444';
        $expectedResourceName = sprintf(
            'customers/%s/campaignConversionGoals/%s~%s~%s',
            $customerId,
            $campaignId,
            $category,
            $origin
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignConversionGoal(
                $customerId,
                $campaignId,
                $category,
                $origin
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forPaymentsAccount()
     */
    public function testGetNameForPaymentsAccount()
    {
        $customerId = '111111';
        $paymentsAccountId = '1111-2222-3333-4444';
        $expectedResourceName = sprintf(
            'customers/%s/paymentsAccounts/%s',
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAccessibleBiddingStrategy()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAccountBudget()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAccountBudgetProposal()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAccountLink()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAd()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroup()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupAd()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupAdAssetView()
     */
    public function testGetNameForAdGroupAdAssetView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $adId = '333333';
        $assetId = '444444';
        $fieldType = '555555';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupAdAssetViews/%s~%s~%s~%s",
            $customerId,
            $adGroupId,
            $adId,
            $assetId,
            $fieldType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAdAssetView(
                $customerId,
                $adGroupId,
                $adId,
                $assetId,
                $fieldType
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupAdLabel()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupAsset()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupAudienceView()
     */
    public function testGetNameForAdGroupAudienceView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupAudienceViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAudienceView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupBidModifier()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupCriterion()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupCriterionCustomizer()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupCriterionLabel()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupCriterionSimulation()
     */
    public function testGetNameForAdGroupCriterionSimulation()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $type = '444444';
        $modificationMethod = '555555';
        $startDate = '666666';
        $endDate = '777777';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupCriterionSimulations/%s~%s~%s~%s~%s~%s",
            $customerId,
            $adGroupId,
            $criterionId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterionSimulation(
                $customerId,
                $adGroupId,
                $criterionId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupCustomizer()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupExtensionSetting()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupFeed()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupLabel()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdGroupSimulation()
     */
    public function testGetNameForAdGroupSimulation()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $type = '333333';
        $modificationMethod = '444444';
        $startDate = '555555';
        $endDate = '666666';
        $expectedResourceName = sprintf(
            "customers/%s/adGroupSimulations/%s~%s~%s~%s~%s",
            $customerId,
            $adGroupId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupSimulation(
                $customerId,
                $adGroupId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdParameter()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAdScheduleView()
     */
    public function testGetNameForAdScheduleView()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/adScheduleViews/%s~%s",
            $customerId,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdScheduleView(
                $customerId,
                $campaignId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAgeRangeView()
     */
    public function testGetNameForAgeRangeView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/ageRangeViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAgeRangeView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAsset()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetFieldTypeView()
     */
    public function testGetNameForAssetFieldTypeView()
    {
        $customerId = '111111';
        $fieldType = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/assetFieldTypeViews/%s",
            $customerId,
            $fieldType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAssetFieldTypeView(
                $customerId,
                $fieldType
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetGroup()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetGroupAsset()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetGroupListingGroupFilter()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetGroupSignal()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetSet()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forAssetSetAsset()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forBatchJob()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forBiddingDataExclusion()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forBiddingSeasonalityAdjustment()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forBiddingStrategy()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forBiddingStrategySimulation()
     */
    public function testGetNameForBiddingStrategySimulation()
    {
        $customerId = '111111';
        $biddingStrategyId = '222222';
        $type = '333333';
        $modificationMethod = '444444';
        $startDate = '555555';
        $endDate = '666666';
        $expectedResourceName = sprintf(
            "customers/%s/biddingStrategySimulations/%s~%s~%s~%s~%s",
            $customerId,
            $biddingStrategyId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBiddingStrategySimulation(
                $customerId,
                $biddingStrategyId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forBillingSetup()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaign()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignAsset()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignAssetSet()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignAudienceView()
     */
    public function testGetNameForCampaignAudienceView()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/campaignAudienceViews/%s~%s",
            $customerId,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignAudienceView(
                $customerId,
                $campaignId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignBidModifier()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignBudget()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignCriterion()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignCriterionSimulation()
     */
    public function testGetNameForCampaignCriterionSimulation()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $criterionId = '333333';
        $type = '444444';
        $modificationMethod = '555555';
        $startDate = '666666';
        $endDate = '777777';
        $expectedResourceName = sprintf(
            "customers/%s/campaignCriterionSimulations/%s~%s~%s~%s~%s~%s",
            $customerId,
            $campaignId,
            $criterionId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignCriterionSimulation(
                $customerId,
                $campaignId,
                $criterionId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignCustomizer()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignDraft()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignExtensionSetting()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignFeed()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignLabel()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignSharedSet()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCampaignSimulation()
     */
    public function testGetNameForCampaignSimulation()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $type = '333333';
        $modificationMethod = '444444';
        $startDate = '555555';
        $endDate = '666666';
        $expectedResourceName = sprintf(
            "customers/%s/campaignSimulations/%s~%s~%s~%s~%s",
            $customerId,
            $campaignId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignSimulation(
                $customerId,
                $campaignId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCarrierConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forChangeStatus()
     */
    public function testGetNameForChangeStatus()
    {
        $customerId = '111111';
        $changeStatusId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/changeStatus/%s",
            $customerId,
            $changeStatusId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forChangeStatus(
                $customerId,
                $changeStatusId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forClickView()
     */
    public function testGetNameForClickView()
    {
        $customerId = '111111';
        $date = '222222';
        $gclid = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/clickViews/%s~%s",
            $customerId,
            $date,
            $gclid
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forClickView(
                $customerId,
                $date,
                $gclid
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCombinedAudience()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forConversionAction()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forConversionCustomVariable()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forConversionValueRule()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forConversionValueRuleSet()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCurrencyConstant()
     */
    public function testGetNameForCurrencyConstant()
    {
        $code = '111111';
        $expectedResourceName = sprintf(
            "currencyConstants/%s",
            $code
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCurrencyConstant(
                $code
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomAudience()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomConversionGoal()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomer()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerAsset()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerClient()
     */
    public function testGetNameForCustomerClient()
    {
        $customerId = '111111';
        $clientCustomerId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/customerClients/%s",
            $customerId,
            $clientCustomerId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerClient(
                $customerId,
                $clientCustomerId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerClientLink()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerCustomizer()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerExtensionSetting()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerFeed()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerLabel()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerManagerLink()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerNegativeCriterion()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerUserAccess()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomerUserAccessInvitation()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomInterest()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forCustomizerAttribute()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forDetailedDemographic()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forDetailPlacementView()
     */
    public function testGetNameForDetailPlacementView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $base64Placement = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/detailPlacementViews/%s~%s",
            $customerId,
            $adGroupId,
            $base64Placement
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDetailPlacementView(
                $customerId,
                $adGroupId,
                $base64Placement
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forDisplayKeywordView()
     */
    public function testGetNameForDisplayKeywordView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/displayKeywordViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDisplayKeywordView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forDistanceView()
     */
    public function testGetNameForDistanceView()
    {
        $customerId = '111111';
        $placeholderChainId = '222222';
        $distanceBucket = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/distanceViews/%s~%s",
            $customerId,
            $placeholderChainId,
            $distanceBucket
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDistanceView(
                $customerId,
                $placeholderChainId,
                $distanceBucket
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forDomainCategory()
     */
    public function testGetNameForDomainCategory()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $base64Category = '333333';
        $languageCode = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/domainCategories/%s~%s~%s",
            $customerId,
            $campaignId,
            $base64Category,
            $languageCode
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDomainCategory(
                $customerId,
                $campaignId,
                $base64Category,
                $languageCode
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forDynamicSearchAdsSearchTermView()
     */
    public function testGetNameForDynamicSearchAdsSearchTermView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $searchTermFingerprint = '333333';
        $headlineFingerprint = '444444';
        $landingPageFingerprint = '555555';
        $pageUrlFingerprint = '666666';
        $expectedResourceName = sprintf(
            "customers/%s/dynamicSearchAdsSearchTermViews/%s~%s~%s~%s~%s",
            $customerId,
            $adGroupId,
            $searchTermFingerprint,
            $headlineFingerprint,
            $landingPageFingerprint,
            $pageUrlFingerprint
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDynamicSearchAdsSearchTermView(
                $customerId,
                $adGroupId,
                $searchTermFingerprint,
                $headlineFingerprint,
                $landingPageFingerprint,
                $pageUrlFingerprint
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forExpandedLandingPageView()
     */
    public function testGetNameForExpandedLandingPageView()
    {
        $customerId = '111111';
        $expandedFinalUrlFingerprint = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/expandedLandingPageViews/%s",
            $customerId,
            $expandedFinalUrlFingerprint
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forExpandedLandingPageView(
                $customerId,
                $expandedFinalUrlFingerprint
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forExperiment()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forExperimentArm()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forExtensionFeedItem()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeed()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeedItem()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeedItemSet()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeedItemSetLink()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeedItemTarget()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeedMapping()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forFeedPlaceholderView()
     */
    public function testGetNameForFeedPlaceholderView()
    {
        $customerId = '111111';
        $placeholderType = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/feedPlaceholderViews/%s",
            $customerId,
            $placeholderType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedPlaceholderView(
                $customerId,
                $placeholderType
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forGenderView()
     */
    public function testGetNameForGenderView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/genderViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGenderView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forGeographicView()
     */
    public function testGetNameForGeographicView()
    {
        $customerId = '111111';
        $countryCriterionId = '222222';
        $locationType = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/geographicViews/%s~%s",
            $customerId,
            $countryCriterionId,
            $locationType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGeographicView(
                $customerId,
                $countryCriterionId,
                $locationType
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forGeoTargetConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forGoogleAdsField()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forGroupPlacementView()
     */
    public function testGetNameForGroupPlacementView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $base64Placement = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/groupPlacementViews/%s~%s",
            $customerId,
            $adGroupId,
            $base64Placement
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGroupPlacementView(
                $customerId,
                $adGroupId,
                $base64Placement
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forHotelGroupView()
     */
    public function testGetNameForHotelGroupView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/hotelGroupViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forHotelGroupView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forHotelPerformanceView()
     */
    public function testGetNameForHotelPerformanceView()
    {
        $customerId = '111111';
        $expectedResourceName = sprintf(
            "customers/%s/hotelPerformanceView",
            $customerId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forHotelPerformanceView(
                $customerId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forIncomeRangeView()
     */
    public function testGetNameForIncomeRangeView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/incomeRangeViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forIncomeRangeView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordPlan()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordPlanAdGroup()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordPlanAdGroupKeyword()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordPlanCampaign()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordPlanCampaignKeyword()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordThemeConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forKeywordView()
     */
    public function testGetNameForKeywordView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/keywordViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forLabel()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forLandingPageView()
     */
    public function testGetNameForLandingPageView()
    {
        $customerId = '111111';
        $unexpandedFinalUrlFingerprint = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/landingPageViews/%s",
            $customerId,
            $unexpandedFinalUrlFingerprint
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLandingPageView(
                $customerId,
                $unexpandedFinalUrlFingerprint
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forLanguageConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forLifeEvent()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forLocationView()
     */
    public function testGetNameForLocationView()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/locationViews/%s~%s",
            $customerId,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLocationView(
                $customerId,
                $campaignId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forManagedPlacementView()
     */
    public function testGetNameForManagedPlacementView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/managedPlacementViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forManagedPlacementView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forMediaFile()
     */
    public function testGetNameForMediaFile()
    {
        $customerId = '111111';
        $mediaFileId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/mediaFiles/%s",
            $customerId,
            $mediaFileId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMediaFile(
                $customerId,
                $mediaFileId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forMerchantCenterLink()
     */
    public function testGetNameForMerchantCenterLink()
    {
        $customerId = '111111';
        $merchantCenterId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/merchantCenterLinks/%s",
            $customerId,
            $merchantCenterId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMerchantCenterLink(
                $customerId,
                $merchantCenterId
            )
        );

        $names = MerchantCenterLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals($customerId, $names['customer_id']);
        $this->assertEquals($merchantCenterId, $names['merchant_center_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forMobileAppCategoryConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forMobileDeviceConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forOfflineUserDataJob()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forOperatingSystemVersionConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forPaidOrganicSearchTermView()
     */
    public function testGetNameForPaidOrganicSearchTermView()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $adGroupId = '333333';
        $base64SearchTerm = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/paidOrganicSearchTermViews/%s~%s~%s",
            $customerId,
            $campaignId,
            $adGroupId,
            $base64SearchTerm
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forPaidOrganicSearchTermView(
                $customerId,
                $campaignId,
                $adGroupId,
                $base64SearchTerm
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forParentalStatusView()
     */
    public function testGetNameForParentalStatusView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/parentalStatusViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forParentalStatusView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forProductBiddingCategoryConstant()
     */
    public function testGetNameForProductBiddingCategoryConstant()
    {
        $countryCode = '111111';
        $level = '222222';
        $id = '333333';
        $expectedResourceName = sprintf(
            "productBiddingCategoryConstants/%s~%s~%s",
            $countryCode,
            $level,
            $id
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forProductBiddingCategoryConstant(
                $countryCode,
                $level,
                $id
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forProductGroupView()
     */
    public function testGetNameForProductGroupView()
    {
        $customerId = '111111';
        $adgroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/productGroupViews/%s~%s",
            $customerId,
            $adgroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forProductGroupView(
                $customerId,
                $adgroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forRecommendation()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forRemarketingAction()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forSearchTermView()
     */
    public function testGetNameForSearchTermView()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $adGroupId = '333333';
        $query = '444444';
        $expectedResourceName = sprintf(
            "customers/%s/searchTermViews/%s~%s~%s",
            $customerId,
            $campaignId,
            $adGroupId,
            $query
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSearchTermView(
                $customerId,
                $campaignId,
                $adGroupId,
                $query
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forSharedCriterion()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forSharedSet()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forShoppingPerformanceView()
     */
    public function testGetNameForShoppingPerformanceView()
    {
        $customerId = '111111';
        $expectedResourceName = sprintf(
            "customers/%s/shoppingPerformanceView",
            $customerId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forShoppingPerformanceView(
                $customerId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forSmartCampaignSearchTermView()
     */
    public function testGetNameForSmartCampaignSearchTermView()
    {
        $customerId = '111111';
        $campaignId = '222222';
        $query = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/smartCampaignSearchTermViews/%s~%s",
            $customerId,
            $campaignId,
            $query
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSmartCampaignSearchTermView(
                $customerId,
                $campaignId,
                $query
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forSmartCampaignSetting()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forThirdPartyAppAnalyticsLink()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forTopicConstant()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forTopicView()
     */
    public function testGetNameForTopicView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/topicViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forTopicView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forUserInterest()
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
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forUserList()
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
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forUserLocationView()
     */
    public function testGetNameForUserLocationView()
    {
        $customerId = '111111';
        $countryCriterionId = '222222';
        $isTargetingLocation = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/userLocationViews/%s~%s",
            $customerId,
            $countryCriterionId,
            $isTargetingLocation
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forUserLocationView(
                $customerId,
                $countryCriterionId,
                $isTargetingLocation
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forVideo()
     */
    public function testGetNameForVideo()
    {
        $customerId = '111111';
        $videoId = '222222';
        $expectedResourceName = sprintf(
            "customers/%s/videos/%s",
            $customerId,
            $videoId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forVideo(
                $customerId,
                $videoId
            )
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V12\ResourceNames::forWebpageView()
     */
    public function testGetNameForWebpageView()
    {
        $customerId = '111111';
        $adGroupId = '222222';
        $criterionId = '333333';
        $expectedResourceName = sprintf(
            "customers/%s/webpageViews/%s~%s",
            $customerId,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forWebpageView(
                $customerId,
                $adGroupId,
                $criterionId
            )
        );
    }
}

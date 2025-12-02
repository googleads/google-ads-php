<?php
/*
 * Copyright 2025 Google LLC
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

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

return [
    'interfaces' => [
        'google.ads.googleads.v20.services.BatchJobService' => [
            'RunBatchJob' => [
                'longRunning' => [
                    'operationReturnType' => '\Google\Protobuf\GPBEmpty',
                    'metadataReturnType' => '\Google\Ads\GoogleAds\V20\Resources\BatchJob\BatchJobMetadata',
                    'initialPollDelayMillis' => '500',
                    'pollDelayMultiplier' => '1.5',
                    'maxPollDelayMillis' => '5000',
                    'totalPollTimeoutMillis' => '300000',
                ],
                'callType' => \Google\ApiCore\Call::LONGRUNNING_CALL,
                'headerParams' => [
                    [
                        'keyName' => 'resource_name',
                        'fieldAccessors' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'AddBatchJobOperations' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V20\Services\AddBatchJobOperationsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'resource_name',
                        'fieldAccessors' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'ListBatchJobResults' => [
                'pageStreaming' => [
                    'requestPageTokenGetMethod' => 'getPageToken',
                    'requestPageTokenSetMethod' => 'setPageToken',
                    'requestPageSizeGetMethod' => 'getPageSize',
                    'requestPageSizeSetMethod' => 'setPageSize',
                    'responsePageTokenGetMethod' => 'getNextPageToken',
                    'resourcesGetMethod' => 'getResults',
                ],
                'callType' => \Google\ApiCore\Call::PAGINATED_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V20\Services\ListBatchJobResultsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'resource_name',
                        'fieldAccessors' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateBatchJob' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V20\Services\MutateBatchJobResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'accessibleBiddingStrategy' => 'customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}',
                'ad' => 'customers/{customer_id}/ads/{ad_id}',
                'adGroup' => 'customers/{customer_id}/adGroups/{ad_group_id}',
                'adGroupAd' => 'customers/{customer_id}/adGroupAds/{ad_group_id}~{ad_id}',
                'adGroupAdLabel' => 'customers/{customer_id}/adGroupAdLabels/{ad_group_id}~{ad_id}~{label_id}',
                'adGroupAsset' => 'customers/{customer_id}/adGroupAssets/{ad_group_id}~{asset_id}~{field_type}',
                'adGroupBidModifier' => 'customers/{customer_id}/adGroupBidModifiers/{ad_group_id}~{criterion_id}',
                'adGroupCriterion' => 'customers/{customer_id}/adGroupCriteria/{ad_group_id}~{criterion_id}',
                'adGroupCriterionCustomizer' => 'customers/{customer_id}/adGroupCriterionCustomizers/{ad_group_id}~{criterion_id}~{customizer_attribute_id}',
                'adGroupCriterionLabel' => 'customers/{customer_id}/adGroupCriterionLabels/{ad_group_id}~{criterion_id}~{label_id}',
                'adGroupCustomizer' => 'customers/{customer_id}/adGroupCustomizers/{ad_group_id}~{customizer_attribute_id}',
                'adGroupLabel' => 'customers/{customer_id}/adGroupLabels/{ad_group_id}~{label_id}',
                'adParameter' => 'customers/{customer_id}/adParameters/{ad_group_id}~{criterion_id}~{parameter_index}',
                'asset' => 'customers/{customer_id}/assets/{asset_id}',
                'assetGroup' => 'customers/{customer_id}/assetGroups/{asset_group_id}',
                'assetGroupAsset' => 'customers/{customer_id}/assetGroupAssets/{asset_group_id}~{asset_id}~{field_type}',
                'assetGroupListingGroupFilter' => 'customers/{customer_id}/assetGroupListingGroupFilters/{asset_group_id}~{listing_group_filter_id}',
                'assetGroupSignal' => 'customers/{customer_id}/assetGroupSignals/{asset_group_id}~{criterion_id}',
                'assetSet' => 'customers/{customer_id}/assetSets/{asset_set_id}',
                'assetSetAsset' => 'customers/{customer_id}/assetSetAssets/{asset_set_id}~{asset_id}',
                'audience' => 'customers/{customer_id}/audiences/{audience_id}',
                'batchJob' => 'customers/{customer_id}/batchJobs/{batch_job_id}',
                'biddingDataExclusion' => 'customers/{customer_id}/biddingDataExclusions/{seasonality_event_id}',
                'biddingSeasonalityAdjustment' => 'customers/{customer_id}/biddingSeasonalityAdjustments/{seasonality_event_id}',
                'biddingStrategy' => 'customers/{customer_id}/biddingStrategies/{bidding_strategy_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignAsset' => 'customers/{customer_id}/campaignAssets/{campaign_id}~{asset_id}~{field_type}',
                'campaignAssetSet' => 'customers/{customer_id}/campaignAssetSets/{campaign_id}~{asset_set_id}',
                'campaignBidModifier' => 'customers/{customer_id}/campaignBidModifiers/{campaign_id}~{criterion_id}',
                'campaignBudget' => 'customers/{customer_id}/campaignBudgets/{campaign_budget_id}',
                'campaignConversionGoal' => 'customers/{customer_id}/campaignConversionGoals/{campaign_id}~{category}~{source}',
                'campaignCriterion' => 'customers/{customer_id}/campaignCriteria/{campaign_id}~{criterion_id}',
                'campaignCustomizer' => 'customers/{customer_id}/campaignCustomizers/{campaign_id}~{customizer_attribute_id}',
                'campaignDraft' => 'customers/{customer_id}/campaignDrafts/{base_campaign_id}~{draft_id}',
                'campaignGroup' => 'customers/{customer_id}/campaignGroups/{campaign_group_id}',
                'campaignLabel' => 'customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}',
                'campaignSharedSet' => 'customers/{customer_id}/campaignSharedSets/{campaign_id}~{shared_set_id}',
                'carrierConstant' => 'carrierConstants/{criterion_id}',
                'combinedAudience' => 'customers/{customer_id}/combinedAudiences/{combined_audience_id}',
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
                'conversionCustomVariable' => 'customers/{customer_id}/conversionCustomVariables/{conversion_custom_variable_id}',
                'conversionGoalCampaignConfig' => 'customers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}',
                'conversionValueRule' => 'customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}',
                'conversionValueRuleSet' => 'customers/{customer_id}/conversionValueRuleSets/{conversion_value_rule_set_id}',
                'customConversionGoal' => 'customers/{customer_id}/customConversionGoals/{goal_id}',
                'customer' => 'customers/{customer_id}',
                'customerAsset' => 'customers/{customer_id}/customerAssets/{asset_id}~{field_type}',
                'customerConversionGoal' => 'customers/{customer_id}/customerConversionGoals/{category}~{source}',
                'customerCustomizer' => 'customers/{customer_id}/customerCustomizers/{customizer_attribute_id}',
                'customerLabel' => 'customers/{customer_id}/customerLabels/{label_id}',
                'customerNegativeCriterion' => 'customers/{customer_id}/customerNegativeCriteria/{criterion_id}',
                'customizerAttribute' => 'customers/{customer_id}/customizerAttributes/{customizer_attribute_id}',
                'detailedDemographic' => 'customers/{customer_id}/detailedDemographics/{detailed_demographic_id}',
                'experiment' => 'customers/{customer_id}/experiments/{trial_id}',
                'experimentArm' => 'customers/{customer_id}/experimentArms/{trial_id}~{trial_arm_id}',
                'geoTargetConstant' => 'geoTargetConstants/{criterion_id}',
                'keywordPlan' => 'customers/{customer_id}/keywordPlans/{keyword_plan_id}',
                'keywordPlanAdGroup' => 'customers/{customer_id}/keywordPlanAdGroups/{keyword_plan_ad_group_id}',
                'keywordPlanAdGroupKeyword' => 'customers/{customer_id}/keywordPlanAdGroupKeywords/{keyword_plan_ad_group_keyword_id}',
                'keywordPlanCampaign' => 'customers/{customer_id}/keywordPlanCampaigns/{keyword_plan_campaign_id}',
                'keywordPlanCampaignKeyword' => 'customers/{customer_id}/keywordPlanCampaignKeywords/{keyword_plan_campaign_keyword_id}',
                'keywordThemeConstant' => 'keywordThemeConstants/{express_category_id}~{express_sub_category_id}',
                'label' => 'customers/{customer_id}/labels/{label_id}',
                'languageConstant' => 'languageConstants/{criterion_id}',
                'lifeEvent' => 'customers/{customer_id}/lifeEvents/{life_event_id}',
                'mobileAppCategoryConstant' => 'mobileAppCategoryConstants/{mobile_app_category_id}',
                'mobileDeviceConstant' => 'mobileDeviceConstants/{criterion_id}',
                'operatingSystemVersionConstant' => 'operatingSystemVersionConstants/{criterion_id}',
                'recommendationSubscription' => 'customers/{customer_id}/recommendationSubscriptions/{recommendation_type}',
                'remarketingAction' => 'customers/{customer_id}/remarketingActions/{remarketing_action_id}',
                'sharedCriterion' => 'customers/{customer_id}/sharedCriteria/{shared_set_id}~{criterion_id}',
                'sharedSet' => 'customers/{customer_id}/sharedSets/{shared_set_id}',
                'smartCampaignSetting' => 'customers/{customer_id}/smartCampaignSettings/{campaign_id}',
                'topicConstant' => 'topicConstants/{topic_id}',
                'userInterest' => 'customers/{customer_id}/userInterests/{user_interest_id}',
                'userList' => 'customers/{customer_id}/userLists/{user_list_id}',
            ],
        ],
    ],
];

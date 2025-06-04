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
        'google.ads.googleads.v20.services.CampaignService' => [
            'EnablePMaxBrandGuidelines' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V20\Services\EnablePMaxBrandGuidelinesResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'MutateCampaigns' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V20\Services\MutateCampaignsResponse',
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
                'assetSet' => 'customers/{customer_id}/assetSets/{asset_set_id}',
                'biddingStrategy' => 'customers/{customer_id}/biddingStrategies/{bidding_strategy_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignBudget' => 'customers/{customer_id}/campaignBudgets/{campaign_budget_id}',
                'campaignGroup' => 'customers/{customer_id}/campaignGroups/{campaign_group_id}',
                'campaignLabel' => 'customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}',
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
            ],
        ],
    ],
];

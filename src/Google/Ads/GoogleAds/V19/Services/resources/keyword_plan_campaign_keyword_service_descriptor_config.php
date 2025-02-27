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
        'google.ads.googleads.v19.services.KeywordPlanCampaignKeywordService' => [
            'MutateKeywordPlanCampaignKeywords' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V19\Services\MutateKeywordPlanCampaignKeywordsResponse',
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
                'keywordPlanCampaign' => 'customers/{customer_id}/keywordPlanCampaigns/{keyword_plan_campaign_id}',
                'keywordPlanCampaignKeyword' => 'customers/{customer_id}/keywordPlanCampaignKeywords/{keyword_plan_campaign_keyword_id}',
            ],
        ],
    ],
];

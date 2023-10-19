<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.KeywordPlanCampaignService' => [
            'MutateKeywordPlanCampaigns' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateKeywordPlanCampaignsResponse',
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
                'geoTargetConstant' => 'geoTargetConstants/{criterion_id}',
                'keywordPlan' => 'customers/{customer_id}/keywordPlans/{keyword_plan_id}',
                'keywordPlanCampaign' => 'customers/{customer_id}/keywordPlanCampaigns/{keyword_plan_campaign_id}',
                'languageConstant' => 'languageConstants/{criterion_id}',
            ],
        ],
    ],
];

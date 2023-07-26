<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.KeywordPlanService' => [
            'MutateKeywordPlans' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateKeywordPlansResponse',
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
                'keywordPlan' => 'customers/{customer_id}/keywordPlans/{keyword_plan_id}',
            ],
        ],
    ],
];

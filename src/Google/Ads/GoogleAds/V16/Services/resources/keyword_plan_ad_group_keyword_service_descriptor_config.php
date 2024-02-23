<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.KeywordPlanAdGroupKeywordService' => [
            'MutateKeywordPlanAdGroupKeywords' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateKeywordPlanAdGroupKeywordsResponse',
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
                'keywordPlanAdGroup' => 'customers/{customer_id}/keywordPlanAdGroups/{keyword_plan_ad_group_id}',
                'keywordPlanAdGroupKeyword' => 'customers/{customer_id}/keywordPlanAdGroupKeywords/{keyword_plan_ad_group_keyword_id}',
            ],
        ],
    ],
];

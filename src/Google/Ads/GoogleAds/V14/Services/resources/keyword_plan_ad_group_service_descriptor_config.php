<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.KeywordPlanAdGroupService' => [
            'MutateKeywordPlanAdGroups' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateKeywordPlanAdGroupsResponse',
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
                'keywordPlanCampaign' => 'customers/{customer_id}/keywordPlanCampaigns/{keyword_plan_campaign_id}',
            ],
        ],
    ],
];

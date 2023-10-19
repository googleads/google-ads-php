<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.KeywordPlanCampaignKeywordService' => [
            'MutateKeywordPlanCampaignKeywords' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateKeywordPlanCampaignKeywordsResponse',
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

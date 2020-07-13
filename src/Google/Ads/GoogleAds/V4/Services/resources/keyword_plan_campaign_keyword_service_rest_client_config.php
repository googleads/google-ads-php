<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.KeywordPlanCampaignKeywordService' => [
            'GetKeywordPlanCampaignKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/keywordPlanCampaignKeywords/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlanCampaignKeywords' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/keywordPlanCampaignKeywords:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

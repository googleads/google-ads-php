<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.KeywordPlanCampaignKeywordService' => [
            'GetKeywordPlanCampaignKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/keywordPlanCampaignKeywords/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/keywordPlanCampaignKeywords:mutate',
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

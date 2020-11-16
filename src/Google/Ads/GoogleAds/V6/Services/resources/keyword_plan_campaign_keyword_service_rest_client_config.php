<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.KeywordPlanCampaignKeywordService' => [
            'GetKeywordPlanCampaignKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/keywordPlanCampaignKeywords/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/keywordPlanCampaignKeywords:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.KeywordPlanKeywordService' => [
            'GetKeywordPlanKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/keywordPlanKeywords/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlanKeywords' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/keywordPlanKeywords:mutate',
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

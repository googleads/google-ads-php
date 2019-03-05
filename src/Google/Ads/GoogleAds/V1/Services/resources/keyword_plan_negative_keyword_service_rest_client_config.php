<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.KeywordPlanNegativeKeywordService' => [
            'GetKeywordPlanNegativeKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/keywordPlanNegativeKeywords/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlanNegativeKeywords' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/keywordPlanNegativeKeywords:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.KeywordPlanNegativeKeywordService' => [
            'GetKeywordPlanNegativeKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/keywordPlanNegativeKeywords/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/keywordPlanNegativeKeywords:mutate',
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

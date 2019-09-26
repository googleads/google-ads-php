<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.KeywordPlanNegativeKeywordService' => [
            'GetKeywordPlanNegativeKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/keywordPlanNegativeKeywords/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/keywordPlanNegativeKeywords:mutate',
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

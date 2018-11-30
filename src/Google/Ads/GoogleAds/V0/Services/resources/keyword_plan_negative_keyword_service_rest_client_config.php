<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.KeywordPlanNegativeKeywordService' => [
            'GetKeywordPlanNegativeKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/keywordPlanNegativeKeywords/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/keywordPlanNegativeKeywords:mutate',
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

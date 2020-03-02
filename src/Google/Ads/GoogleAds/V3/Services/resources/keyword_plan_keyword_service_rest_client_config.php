<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.KeywordPlanKeywordService' => [
            'GetKeywordPlanKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/keywordPlanKeywords/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/keywordPlanKeywords:mutate',
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

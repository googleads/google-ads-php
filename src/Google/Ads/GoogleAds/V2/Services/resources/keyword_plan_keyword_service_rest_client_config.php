<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.KeywordPlanKeywordService' => [
            'GetKeywordPlanKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/keywordPlanKeywords/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/keywordPlanKeywords:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.KeywordPlanKeywordService' => [
            'GetKeywordPlanKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/keywordPlanKeywords/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/keywordPlanKeywords:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.KeywordPlanAdGroupKeywordService' => [
            'GetKeywordPlanAdGroupKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/keywordPlanAdGroupKeywords/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlanAdGroupKeywords' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/keywordPlanAdGroupKeywords:mutate',
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

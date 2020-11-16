<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.KeywordPlanAdGroupKeywordService' => [
            'GetKeywordPlanAdGroupKeyword' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/keywordPlanAdGroupKeywords/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/keywordPlanAdGroupKeywords:mutate',
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

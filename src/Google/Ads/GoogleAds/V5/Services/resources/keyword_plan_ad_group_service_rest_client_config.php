<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.KeywordPlanAdGroupService' => [
            'GetKeywordPlanAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/keywordPlanAdGroups/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlanAdGroups' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/keywordPlanAdGroups:mutate',
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

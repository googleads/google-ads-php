<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.KeywordPlanAdGroupService' => [
            'GetKeywordPlanAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/keywordPlanAdGroups/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/keywordPlanAdGroups:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.KeywordPlanAdGroupService' => [
            'GetKeywordPlanAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/keywordPlanAdGroups/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/keywordPlanAdGroups:mutate',
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

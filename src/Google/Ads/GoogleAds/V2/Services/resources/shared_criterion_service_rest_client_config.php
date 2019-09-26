<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.SharedCriterionService' => [
            'GetSharedCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/sharedCriteria/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateSharedCriteria' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}/sharedCriteria:mutate',
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

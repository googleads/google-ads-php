<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.SharedCriterionService' => [
            'GetSharedCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/sharedCriteria/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/sharedCriteria:mutate',
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

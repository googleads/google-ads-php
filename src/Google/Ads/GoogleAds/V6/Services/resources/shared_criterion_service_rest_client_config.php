<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.SharedCriterionService' => [
            'GetSharedCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/sharedCriteria/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/sharedCriteria:mutate',
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

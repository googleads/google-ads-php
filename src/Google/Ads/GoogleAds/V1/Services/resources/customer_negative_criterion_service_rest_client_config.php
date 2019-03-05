<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CustomerNegativeCriterionService' => [
            'GetCustomerNegativeCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/customerNegativeCriteria/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerNegativeCriteria' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/customerNegativeCriteria:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerNegativeCriterionService' => [
            'GetCustomerNegativeCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerNegativeCriteria/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerNegativeCriteria:mutate',
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

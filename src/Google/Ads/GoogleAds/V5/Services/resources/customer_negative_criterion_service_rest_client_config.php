<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CustomerNegativeCriterionService' => [
            'GetCustomerNegativeCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/customerNegativeCriteria/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/customerNegativeCriteria:mutate',
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

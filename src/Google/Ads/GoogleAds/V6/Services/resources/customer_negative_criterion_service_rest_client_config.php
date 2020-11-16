<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomerNegativeCriterionService' => [
            'GetCustomerNegativeCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/customerNegativeCriteria/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/customerNegativeCriteria:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerNegativeCriterionService' => [
            'GetCustomerNegativeCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customerNegativeCriteria/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/customerNegativeCriteria:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerService' => [
            'GetCustomer' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomer' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'ListAccessibleCustomers' => [
                'method' => 'get',
                'uriTemplate' => '/v2/customers:listAccessibleCustomers',
            ],
            'CreateCustomerClient' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}:createCustomerClient',
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

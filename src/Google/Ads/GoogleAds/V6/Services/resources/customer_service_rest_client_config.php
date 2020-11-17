<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomerService' => [
            'GetCustomer' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}:mutate',
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
                'uriTemplate' => '/v6/customers:listAccessibleCustomers',
            ],
            'CreateCustomerClient' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}:createCustomerClient',
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

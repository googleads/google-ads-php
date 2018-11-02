<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CustomerService' => [
            'GetCustomer' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'ListAccessibleCustomers' => [
                'method' => 'get',
                'uriTemplate' => '/v0/customers:listAccessibleCustomers',
            ],
        ],
    ],
];

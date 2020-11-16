<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomerUserAccessService' => [
            'GetCustomerUserAccess' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/customerUserAccesses/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerUserAccess' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/customerUserAccesses:mutate',
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

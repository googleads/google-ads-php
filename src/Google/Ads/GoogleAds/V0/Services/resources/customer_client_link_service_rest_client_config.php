<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CustomerClientLinkService' => [
            'GetCustomerClientLink' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/customerClientLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerClientLink' => [
                'method' => 'post',
                'uriTemplate' => '/v0/customers/{customer_id=*}/customerClientLinks:mutate',
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

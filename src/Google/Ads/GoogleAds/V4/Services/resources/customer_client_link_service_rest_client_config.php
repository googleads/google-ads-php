<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerClientLinkService' => [
            'GetCustomerClientLink' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerClientLinks/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerClientLinks:mutate',
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

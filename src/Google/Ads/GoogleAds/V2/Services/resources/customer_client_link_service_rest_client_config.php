<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerClientLinkService' => [
            'GetCustomerClientLink' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customerClientLinks/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/customerClientLinks:mutate',
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

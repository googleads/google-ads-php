<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomerClientLinkService' => [
            'GetCustomerClientLink' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/customerClientLinks/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/customerClientLinks:mutate',
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

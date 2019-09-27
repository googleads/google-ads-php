<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerClientService' => [
            'GetCustomerClient' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customerClients/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

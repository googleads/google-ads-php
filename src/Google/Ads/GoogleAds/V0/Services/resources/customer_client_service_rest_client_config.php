<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CustomerClientService' => [
            'GetCustomerClient' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/customerClients/*}',
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

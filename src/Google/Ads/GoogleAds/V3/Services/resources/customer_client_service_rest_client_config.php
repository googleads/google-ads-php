<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CustomerClientService' => [
            'GetCustomerClient' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/customerClients/*}',
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

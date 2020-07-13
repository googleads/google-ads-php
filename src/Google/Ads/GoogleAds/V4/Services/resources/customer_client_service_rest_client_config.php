<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerClientService' => [
            'GetCustomerClient' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerClients/*}',
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

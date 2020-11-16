<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomerClientService' => [
            'GetCustomerClient' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/customerClients/*}',
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

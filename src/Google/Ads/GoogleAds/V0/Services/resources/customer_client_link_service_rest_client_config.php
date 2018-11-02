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
        ],
    ],
];

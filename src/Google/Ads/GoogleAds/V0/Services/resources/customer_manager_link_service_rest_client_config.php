<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CustomerManagerLinkService' => [
            'GetCustomerManagerLink' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/customerManagerLinks/*}',
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

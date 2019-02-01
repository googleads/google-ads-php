<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.OperatingSystemVersionConstantService' => [
            'GetOperatingSystemVersionConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=operatingSystemVersionConstants/*}',
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

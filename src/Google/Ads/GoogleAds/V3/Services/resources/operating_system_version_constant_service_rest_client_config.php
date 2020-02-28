<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.OperatingSystemVersionConstantService' => [
            'GetOperatingSystemVersionConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=operatingSystemVersionConstants/*}',
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

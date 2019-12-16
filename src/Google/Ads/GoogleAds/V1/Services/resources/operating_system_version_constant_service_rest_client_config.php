<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.OperatingSystemVersionConstantService' => [
            'GetOperatingSystemVersionConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=operatingSystemVersionConstants/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.OperatingSystemVersionConstantService' => [
            'GetOperatingSystemVersionConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=operatingSystemVersionConstants/*}',
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

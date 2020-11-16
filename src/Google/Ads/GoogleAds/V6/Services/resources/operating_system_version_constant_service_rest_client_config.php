<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.OperatingSystemVersionConstantService' => [
            'GetOperatingSystemVersionConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=operatingSystemVersionConstants/*}',
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

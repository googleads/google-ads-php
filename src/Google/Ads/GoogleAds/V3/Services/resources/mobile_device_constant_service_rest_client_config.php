<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.MobileDeviceConstantService' => [
            'GetMobileDeviceConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=mobileDeviceConstants/*}',
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

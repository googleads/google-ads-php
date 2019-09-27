<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.MobileDeviceConstantService' => [
            'GetMobileDeviceConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=mobileDeviceConstants/*}',
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

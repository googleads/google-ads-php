<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.MobileDeviceConstantService' => [
            'GetMobileDeviceConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=mobileDeviceConstants/*}',
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

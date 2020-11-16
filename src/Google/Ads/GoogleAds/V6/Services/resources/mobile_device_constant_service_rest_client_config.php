<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.MobileDeviceConstantService' => [
            'GetMobileDeviceConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=mobileDeviceConstants/*}',
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

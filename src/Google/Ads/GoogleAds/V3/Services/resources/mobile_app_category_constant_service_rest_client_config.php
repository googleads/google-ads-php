<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.MobileAppCategoryConstantService' => [
            'GetMobileAppCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=mobileAppCategoryConstants/*}',
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

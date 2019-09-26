<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.MobileAppCategoryConstantService' => [
            'GetMobileAppCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=mobileAppCategoryConstants/*}',
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

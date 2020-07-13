<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.MobileAppCategoryConstantService' => [
            'GetMobileAppCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=mobileAppCategoryConstants/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.MobileAppCategoryConstantService' => [
            'GetMobileAppCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=mobileAppCategoryConstants/*}',
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

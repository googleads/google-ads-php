<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.MobileAppCategoryConstantService' => [
            'GetMobileAppCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=mobileAppCategoryConstants/*}',
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

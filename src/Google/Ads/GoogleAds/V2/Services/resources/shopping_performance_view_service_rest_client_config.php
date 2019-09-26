<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ShoppingPerformanceViewService' => [
            'GetShoppingPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/shoppingPerformanceView}',
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

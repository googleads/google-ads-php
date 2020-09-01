<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ShoppingPerformanceViewService' => [
            'GetShoppingPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/shoppingPerformanceView}',
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

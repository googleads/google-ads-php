<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ShoppingPerformanceViewService' => [
            'GetShoppingPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/shoppingPerformanceView}',
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

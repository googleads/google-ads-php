<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ShoppingPerformanceViewService' => [
            'GetShoppingPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/shoppingPerformanceView}',
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

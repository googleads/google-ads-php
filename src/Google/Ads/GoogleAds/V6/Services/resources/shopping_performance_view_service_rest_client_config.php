<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ShoppingPerformanceViewService' => [
            'GetShoppingPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/shoppingPerformanceView}',
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

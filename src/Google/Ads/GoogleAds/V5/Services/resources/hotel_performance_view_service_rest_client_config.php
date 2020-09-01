<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.HotelPerformanceViewService' => [
            'GetHotelPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/hotelPerformanceView}',
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

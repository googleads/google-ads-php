<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.HotelPerformanceViewService' => [
            'GetHotelPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/hotelPerformanceView}',
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

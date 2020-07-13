<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.HotelPerformanceViewService' => [
            'GetHotelPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/hotelPerformanceView}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.HotelPerformanceViewService' => [
            'GetHotelPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/hotelPerformanceView}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.HotelPerformanceViewService' => [
            'GetHotelPerformanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/hotelPerformanceView}',
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

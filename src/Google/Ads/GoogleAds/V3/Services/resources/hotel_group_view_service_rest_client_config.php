<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.HotelGroupViewService' => [
            'GetHotelGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/hotelGroupViews/*}',
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

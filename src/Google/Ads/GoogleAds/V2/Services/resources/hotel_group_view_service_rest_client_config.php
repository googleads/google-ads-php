<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.HotelGroupViewService' => [
            'GetHotelGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/hotelGroupViews/*}',
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

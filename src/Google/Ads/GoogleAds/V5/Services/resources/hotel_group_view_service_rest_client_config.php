<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.HotelGroupViewService' => [
            'GetHotelGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/hotelGroupViews/*}',
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

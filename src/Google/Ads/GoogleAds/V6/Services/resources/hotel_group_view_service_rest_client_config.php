<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.HotelGroupViewService' => [
            'GetHotelGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/hotelGroupViews/*}',
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

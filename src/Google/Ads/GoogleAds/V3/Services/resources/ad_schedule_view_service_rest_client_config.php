<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdScheduleViewService' => [
            'GetAdScheduleView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adScheduleViews/*}',
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

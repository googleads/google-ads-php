<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AdScheduleViewService' => [
            'GetAdScheduleView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/adScheduleViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdScheduleViewService' => [
            'GetAdScheduleView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adScheduleViews/*}',
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

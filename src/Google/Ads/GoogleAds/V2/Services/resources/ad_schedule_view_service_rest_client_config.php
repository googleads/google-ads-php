<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdScheduleViewService' => [
            'GetAdScheduleView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adScheduleViews/*}',
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

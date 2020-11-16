<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdScheduleViewService' => [
            'GetAdScheduleView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adScheduleViews/*}',
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

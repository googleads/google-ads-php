<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.DistanceViewService' => [
            'GetDistanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/distanceViews/*}',
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

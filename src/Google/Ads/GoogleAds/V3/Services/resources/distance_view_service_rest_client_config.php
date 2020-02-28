<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.DistanceViewService' => [
            'GetDistanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/distanceViews/*}',
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

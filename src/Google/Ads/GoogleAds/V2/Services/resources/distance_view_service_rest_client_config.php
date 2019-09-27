<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.DistanceViewService' => [
            'GetDistanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/distanceViews/*}',
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

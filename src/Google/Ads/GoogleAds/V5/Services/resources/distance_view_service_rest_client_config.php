<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.DistanceViewService' => [
            'GetDistanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/distanceViews/*}',
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

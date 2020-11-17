<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.DistanceViewService' => [
            'GetDistanceView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/distanceViews/*}',
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

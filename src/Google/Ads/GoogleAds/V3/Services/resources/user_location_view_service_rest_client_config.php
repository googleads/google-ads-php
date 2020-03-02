<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.UserLocationViewService' => [
            'GetUserLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/userLocationViews/*}',
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

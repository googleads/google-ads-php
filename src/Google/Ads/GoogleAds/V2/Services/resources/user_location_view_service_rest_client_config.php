<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.UserLocationViewService' => [
            'GetUserLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/userLocationViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.UserLocationViewService' => [
            'GetUserLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/userLocationViews/*}',
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

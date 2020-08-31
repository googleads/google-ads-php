<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.UserLocationViewService' => [
            'GetUserLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/userLocationViews/*}',
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

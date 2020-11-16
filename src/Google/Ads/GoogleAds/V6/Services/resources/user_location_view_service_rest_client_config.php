<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.UserLocationViewService' => [
            'GetUserLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/userLocationViews/*}',
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

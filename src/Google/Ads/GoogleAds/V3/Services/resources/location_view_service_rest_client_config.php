<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.LocationViewService' => [
            'GetLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/locationViews/*}',
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

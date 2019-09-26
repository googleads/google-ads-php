<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.LocationViewService' => [
            'GetLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/locationViews/*}',
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

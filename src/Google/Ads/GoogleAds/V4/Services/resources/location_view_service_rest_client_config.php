<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.LocationViewService' => [
            'GetLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/locationViews/*}',
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

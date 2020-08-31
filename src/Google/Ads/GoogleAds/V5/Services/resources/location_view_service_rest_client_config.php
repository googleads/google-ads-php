<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.LocationViewService' => [
            'GetLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/locationViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.LocationViewService' => [
            'GetLocationView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/locationViews/*}',
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

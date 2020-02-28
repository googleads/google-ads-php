<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.GeographicViewService' => [
            'GetGeographicView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/geographicViews/*}',
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

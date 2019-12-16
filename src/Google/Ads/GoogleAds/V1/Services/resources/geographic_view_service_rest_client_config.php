<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.GeographicViewService' => [
            'GetGeographicView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/geographicViews/*}',
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

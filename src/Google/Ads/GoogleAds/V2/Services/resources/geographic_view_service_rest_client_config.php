<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.GeographicViewService' => [
            'GetGeographicView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/geographicViews/*}',
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

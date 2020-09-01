<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.GeographicViewService' => [
            'GetGeographicView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/geographicViews/*}',
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

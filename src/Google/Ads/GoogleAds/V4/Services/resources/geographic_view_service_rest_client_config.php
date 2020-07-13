<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.GeographicViewService' => [
            'GetGeographicView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/geographicViews/*}',
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

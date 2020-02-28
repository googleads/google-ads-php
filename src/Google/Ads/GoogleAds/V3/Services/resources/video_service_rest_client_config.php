<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.VideoService' => [
            'GetVideo' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/videos/*}',
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

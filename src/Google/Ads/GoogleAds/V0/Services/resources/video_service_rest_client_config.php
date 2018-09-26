<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.VideoService' => [
            'GetVideo' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/videos/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.VideoService' => [
            'GetVideo' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/videos/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.VideoService' => [
            'GetVideo' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/videos/*}',
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

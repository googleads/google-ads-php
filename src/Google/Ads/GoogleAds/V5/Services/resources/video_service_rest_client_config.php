<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.VideoService' => [
            'GetVideo' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/videos/*}',
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

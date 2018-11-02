<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.MediaFileService' => [
            'GetMediaFile' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/mediaFiles/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateMediaFiles' => [
                'method' => 'post',
                'uriTemplate' => '/v0/customers/{customer_id=*}/mediaFiles:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.MediaFileService' => [
            'GetMediaFile' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/mediaFiles/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/mediaFiles:mutate',
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

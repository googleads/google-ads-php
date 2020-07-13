<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.MediaFileService' => [
            'GetMediaFile' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/mediaFiles/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/mediaFiles:mutate',
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

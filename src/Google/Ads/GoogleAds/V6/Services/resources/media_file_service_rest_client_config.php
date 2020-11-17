<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.MediaFileService' => [
            'GetMediaFile' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/mediaFiles/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/mediaFiles:mutate',
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

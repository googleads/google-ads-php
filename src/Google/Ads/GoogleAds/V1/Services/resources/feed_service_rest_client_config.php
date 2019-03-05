<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.FeedService' => [
            'GetFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/feeds/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateFeeds' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/feeds:mutate',
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

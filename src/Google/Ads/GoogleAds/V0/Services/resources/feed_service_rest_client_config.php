<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.FeedService' => [
            'GetFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/feeds/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/feeds:mutate',
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

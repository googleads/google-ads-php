<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.FeedService' => [
            'GetFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/feeds/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/feeds:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.FeedService' => [
            'GetFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/feeds/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/feeds:mutate',
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

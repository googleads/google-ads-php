<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedService' => [
            'GetFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feeds/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/feeds:mutate',
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

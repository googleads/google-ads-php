<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedItemService' => [
            'GetFeedItem' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feedItems/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateFeedItems' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/feedItems:mutate',
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

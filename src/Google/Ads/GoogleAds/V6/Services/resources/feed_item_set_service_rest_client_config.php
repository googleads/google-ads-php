<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedItemSetService' => [
            'GetFeedItemSet' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feedItemSets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateFeedItemSets' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/feedItemSets:mutate',
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

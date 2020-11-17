<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedItemSetLinkService' => [
            'GetFeedItemSetLink' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feedItemSetLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateFeedItemSetLinks' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/feedItemSetLinks:mutate',
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

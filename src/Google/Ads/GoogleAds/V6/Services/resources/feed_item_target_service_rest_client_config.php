<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedItemTargetService' => [
            'GetFeedItemTarget' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feedItemTargets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateFeedItemTargets' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/feedItemTargets:mutate',
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

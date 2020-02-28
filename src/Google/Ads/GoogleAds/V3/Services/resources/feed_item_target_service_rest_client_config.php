<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.FeedItemTargetService' => [
            'GetFeedItemTarget' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/feedItemTargets/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/feedItemTargets:mutate',
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

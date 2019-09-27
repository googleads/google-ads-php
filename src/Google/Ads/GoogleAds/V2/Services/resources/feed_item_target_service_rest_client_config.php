<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.FeedItemTargetService' => [
            'GetFeedItemTarget' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/feedItemTargets/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/feedItemTargets:mutate',
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

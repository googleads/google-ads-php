<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.FeedItemTargetService' => [
            'GetFeedItemTarget' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/feedItemTargets/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/feedItemTargets:mutate',
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

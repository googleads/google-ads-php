<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupFeedService' => [
            'GetAdGroupFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupFeeds/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupFeeds' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/adGroupFeeds:mutate',
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

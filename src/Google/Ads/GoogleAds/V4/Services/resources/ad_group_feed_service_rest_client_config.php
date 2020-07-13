<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupFeedService' => [
            'GetAdGroupFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupFeeds/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroupFeeds:mutate',
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

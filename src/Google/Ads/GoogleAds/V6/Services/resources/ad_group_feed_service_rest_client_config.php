<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupFeedService' => [
            'GetAdGroupFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupFeeds/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/adGroupFeeds:mutate',
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

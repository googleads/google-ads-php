<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupFeedService' => [
            'GetAdGroupFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupFeeds/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupFeeds:mutate',
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

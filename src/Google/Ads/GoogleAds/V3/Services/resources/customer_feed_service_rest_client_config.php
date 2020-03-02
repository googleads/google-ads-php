<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CustomerFeedService' => [
            'GetCustomerFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/customerFeeds/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerFeeds' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/customerFeeds:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerFeedService' => [
            'GetCustomerFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerFeeds/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerFeeds:mutate',
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

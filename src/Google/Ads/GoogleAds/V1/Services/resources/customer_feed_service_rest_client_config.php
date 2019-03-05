<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CustomerFeedService' => [
            'GetCustomerFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/customerFeeds/*}',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/customerFeeds:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerFeedService' => [
            'GetCustomerFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customerFeeds/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/customerFeeds:mutate',
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

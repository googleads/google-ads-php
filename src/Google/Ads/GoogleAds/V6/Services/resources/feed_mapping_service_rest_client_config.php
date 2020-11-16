<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedMappingService' => [
            'GetFeedMapping' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feedMappings/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateFeedMappings' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/feedMappings:mutate',
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

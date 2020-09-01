<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.FeedMappingService' => [
            'GetFeedMapping' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/feedMappings/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/feedMappings:mutate',
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

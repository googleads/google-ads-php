<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.FeedMappingService' => [
            'GetFeedMapping' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/feedMappings/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/feedMappings:mutate',
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

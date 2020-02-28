<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.BiddingStrategyService' => [
            'GetBiddingStrategy' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/biddingStrategies/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateBiddingStrategies' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/biddingStrategies:mutate',
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

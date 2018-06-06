<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.BiddingStrategyService' => [
            'GetBiddingStrategy' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/biddingStrategies/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/biddingStrategies:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.BiddingStrategyService' => [
            'GetBiddingStrategy' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/biddingStrategies/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/biddingStrategies:mutate',
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

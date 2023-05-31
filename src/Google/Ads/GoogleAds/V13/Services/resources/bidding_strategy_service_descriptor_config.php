<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.BiddingStrategyService' => [
            'MutateBiddingStrategies' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateBiddingStrategiesResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'biddingStrategy' => 'customers/{customer_id}/biddingStrategies/{bidding_strategy_id}',
            ],
        ],
    ],
];

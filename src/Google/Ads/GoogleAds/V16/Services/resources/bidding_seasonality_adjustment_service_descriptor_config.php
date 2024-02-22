<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.BiddingSeasonalityAdjustmentService' => [
            'MutateBiddingSeasonalityAdjustments' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateBiddingSeasonalityAdjustmentsResponse',
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
                'biddingSeasonalityAdjustment' => 'customers/{customer_id}/biddingSeasonalityAdjustments/{seasonality_event_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
            ],
        ],
    ],
];

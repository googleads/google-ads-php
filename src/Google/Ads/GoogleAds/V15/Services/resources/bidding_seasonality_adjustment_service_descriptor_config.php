<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.BiddingSeasonalityAdjustmentService' => [
            'MutateBiddingSeasonalityAdjustments' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateBiddingSeasonalityAdjustmentsResponse',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.BiddingDataExclusionService' => [
            'MutateBiddingDataExclusions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateBiddingDataExclusionsResponse',
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
                'biddingDataExclusion' => 'customers/{customer_id}/biddingDataExclusions/{seasonality_event_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
            ],
        ],
    ],
];

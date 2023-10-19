<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignBidModifierService' => [
            'MutateCampaignBidModifiers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignBidModifiersResponse',
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
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignBidModifier' => 'customers/{customer_id}/campaignBidModifiers/{campaign_id}~{criterion_id}',
            ],
        ],
    ],
];

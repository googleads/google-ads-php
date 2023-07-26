<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CampaignSharedSetService' => [
            'MutateCampaignSharedSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCampaignSharedSetsResponse',
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
                'campaignSharedSet' => 'customers/{customer_id}/campaignSharedSets/{campaign_id}~{shared_set_id}',
                'sharedSet' => 'customers/{customer_id}/sharedSets/{shared_set_id}',
            ],
        ],
    ],
];

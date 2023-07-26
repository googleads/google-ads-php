<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CampaignConversionGoalService' => [
            'MutateCampaignConversionGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCampaignConversionGoalsResponse',
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
                'campaignConversionGoal' => 'customers/{customer_id}/campaignConversionGoals/{campaign_id}~{category}~{source}',
            ],
        ],
    ],
];

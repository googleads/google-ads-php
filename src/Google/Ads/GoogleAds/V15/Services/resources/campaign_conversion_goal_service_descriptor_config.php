<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignConversionGoalService' => [
            'MutateCampaignConversionGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignConversionGoalsResponse',
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

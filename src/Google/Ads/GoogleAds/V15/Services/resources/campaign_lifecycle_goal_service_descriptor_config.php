<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignLifecycleGoalService' => [
            'ConfigureCampaignLifecycleGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\ConfigureCampaignLifecycleGoalsResponse',
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
                'campaignLifecycleGoal' => 'customers/{customer_id}/campaignLifecycleGoals/{campaign_id}',
            ],
        ],
    ],
];

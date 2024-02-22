<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.ConversionGoalCampaignConfigService' => [
            'MutateConversionGoalCampaignConfigs' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateConversionGoalCampaignConfigsResponse',
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
                'conversionGoalCampaignConfig' => 'customers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}',
                'customConversionGoal' => 'customers/{customer_id}/customConversionGoals/{goal_id}',
            ],
        ],
    ],
];

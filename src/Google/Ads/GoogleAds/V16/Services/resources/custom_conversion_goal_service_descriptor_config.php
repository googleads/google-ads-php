<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomConversionGoalService' => [
            'MutateCustomConversionGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomConversionGoalsResponse',
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
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
                'customConversionGoal' => 'customers/{customer_id}/customConversionGoals/{goal_id}',
            ],
        ],
    ],
];

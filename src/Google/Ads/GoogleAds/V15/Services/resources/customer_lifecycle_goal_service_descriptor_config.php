<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CustomerLifecycleGoalService' => [
            'ConfigureCustomerLifecycleGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\ConfigureCustomerLifecycleGoalsResponse',
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
                'customerLifecycleGoal' => 'customers/{customer_id}/customerLifecycleGoals',
                'userList' => 'customers/{customer_id}/userLists/{user_list_id}',
            ],
        ],
    ],
];

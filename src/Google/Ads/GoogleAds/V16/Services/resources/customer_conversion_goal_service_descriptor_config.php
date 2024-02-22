<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerConversionGoalService' => [
            'MutateCustomerConversionGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerConversionGoalsResponse',
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
                'customerConversionGoal' => 'customers/{customer_id}/customerConversionGoals/{category}~{source}',
            ],
        ],
    ],
];

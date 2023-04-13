<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CustomerConversionGoalService' => [
            'MutateCustomerConversionGoals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCustomerConversionGoalsResponse',
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

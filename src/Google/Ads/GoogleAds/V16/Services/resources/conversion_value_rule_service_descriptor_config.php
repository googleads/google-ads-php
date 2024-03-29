<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.ConversionValueRuleService' => [
            'MutateConversionValueRules' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateConversionValueRulesResponse',
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
                'conversionValueRule' => 'customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}',
                'customer' => 'customers/{customer_id}',
                'geoTargetConstant' => 'geoTargetConstants/{criterion_id}',
                'userInterest' => 'customers/{customer_id}/userInterests/{user_interest_id}',
                'userList' => 'customers/{customer_id}/userLists/{user_list_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ConversionValueRuleSetService' => [
            'MutateConversionValueRuleSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateConversionValueRuleSetsResponse',
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
                'conversionValueRule' => 'customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}',
                'conversionValueRuleSet' => 'customers/{customer_id}/conversionValueRuleSets/{conversion_value_rule_set_id}',
                'customer' => 'customers/{customer_id}',
            ],
        ],
    ],
];

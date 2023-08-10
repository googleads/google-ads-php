<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.AdParameterService' => [
            'MutateAdParameters' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateAdParametersResponse',
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
                'adGroupCriterion' => 'customers/{customer_id}/adGroupCriteria/{ad_group_id}~{criterion_id}',
                'adParameter' => 'customers/{customer_id}/adParameters/{ad_group_id}~{criterion_id}~{parameter_index}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.AdGroupCriterionService' => [
            'MutateAdGroupCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateAdGroupCriteriaResponse',
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
                'adGroup' => 'customers/{customer_id}/adGroups/{ad_group_id}',
                'adGroupCriterion' => 'customers/{customer_id}/adGroupCriteria/{ad_group_id}~{criterion_id}',
                'adGroupCriterionLabel' => 'customers/{customer_id}/adGroupCriterionLabels/{ad_group_id}~{criterion_id}~{label_id}',
            ],
        ],
    ],
];

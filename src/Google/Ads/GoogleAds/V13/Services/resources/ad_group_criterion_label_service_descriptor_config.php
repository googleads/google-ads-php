<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.AdGroupCriterionLabelService' => [
            'MutateAdGroupCriterionLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateAdGroupCriterionLabelsResponse',
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
                'adGroupCriterionLabel' => 'customers/{customer_id}/adGroupCriterionLabels/{ad_group_id}~{criterion_id}~{label_id}',
                'label' => 'customers/{customer_id}/labels/{label_id}',
            ],
        ],
    ],
];

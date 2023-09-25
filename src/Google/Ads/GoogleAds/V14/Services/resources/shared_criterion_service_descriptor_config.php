<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.SharedCriterionService' => [
            'MutateSharedCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateSharedCriteriaResponse',
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
                'mobileAppCategoryConstant' => 'mobileAppCategoryConstants/{mobile_app_category_id}',
                'sharedCriterion' => 'customers/{customer_id}/sharedCriteria/{shared_set_id}~{criterion_id}',
                'sharedSet' => 'customers/{customer_id}/sharedSets/{shared_set_id}',
            ],
        ],
    ],
];

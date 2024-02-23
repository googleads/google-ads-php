<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerNegativeCriterionService' => [
            'MutateCustomerNegativeCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerNegativeCriteriaResponse',
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
                'customerNegativeCriterion' => 'customers/{customer_id}/customerNegativeCriteria/{criterion_id}',
                'mobileAppCategoryConstant' => 'mobileAppCategoryConstants/{mobile_app_category_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CustomerNegativeCriterionService' => [
            'MutateCustomerNegativeCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCustomerNegativeCriteriaResponse',
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
            ],
        ],
    ],
];

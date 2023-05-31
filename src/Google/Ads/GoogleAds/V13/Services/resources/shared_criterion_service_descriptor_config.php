<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.SharedCriterionService' => [
            'MutateSharedCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateSharedCriteriaResponse',
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
                'sharedCriterion' => 'customers/{customer_id}/sharedCriteria/{shared_set_id}~{criterion_id}',
                'sharedSet' => 'customers/{customer_id}/sharedSets/{shared_set_id}',
            ],
        ],
    ],
];

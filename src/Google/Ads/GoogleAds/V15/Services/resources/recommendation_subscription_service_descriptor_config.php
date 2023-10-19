<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.RecommendationSubscriptionService' => [
            'MutateRecommendationSubscription' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateRecommendationSubscriptionResponse',
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
                'recommendationSubscription' => 'customers/{customer_id}/recommendationSubscriptions/{recommendation_type}',
            ],
        ],
    ],
];

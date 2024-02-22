<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.RecommendationSubscriptionService' => [
            'MutateRecommendationSubscription' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateRecommendationSubscriptionResponse',
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

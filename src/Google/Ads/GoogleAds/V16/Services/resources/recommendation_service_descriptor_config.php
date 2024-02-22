<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.RecommendationService' => [
            'ApplyRecommendation' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\ApplyRecommendationResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'DismissRecommendation' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\DismissRecommendationResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GenerateRecommendations' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\GenerateRecommendationsResponse',
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
                'ad' => 'customers/{customer_id}/ads/{ad_id}',
                'asset' => 'customers/{customer_id}/assets/{asset_id}',
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
                'recommendation' => 'customers/{customer_id}/recommendations/{recommendation_id}',
            ],
        ],
    ],
];

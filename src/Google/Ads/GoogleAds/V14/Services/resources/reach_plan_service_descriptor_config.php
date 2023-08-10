<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.ReachPlanService' => [
            'GenerateReachForecast' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\GenerateReachForecastResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'ListPlannableLocations' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\ListPlannableLocationsResponse',
            ],
            'ListPlannableProducts' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\ListPlannableProductsResponse',
            ],
        ],
    ],
];

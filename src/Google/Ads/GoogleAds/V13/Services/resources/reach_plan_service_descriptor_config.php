<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.ReachPlanService' => [
            'GenerateReachForecast' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\GenerateReachForecastResponse',
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
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\ListPlannableLocationsResponse',
            ],
            'ListPlannableProducts' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\ListPlannableProductsResponse',
            ],
        ],
    ],
];

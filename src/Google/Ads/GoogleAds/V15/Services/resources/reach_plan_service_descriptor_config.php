<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ReachPlanService' => [
            'GenerateReachForecast' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\GenerateReachForecastResponse',
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
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\ListPlannableLocationsResponse',
            ],
            'ListPlannableProducts' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\ListPlannableProductsResponse',
            ],
        ],
    ],
];

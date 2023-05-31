<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.KeywordPlanService' => [
            'GenerateForecastCurve' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\GenerateForecastCurveResponse',
                'headerParams' => [
                    [
                        'keyName' => 'keyword_plan',
                        'fieldAccessors' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'GenerateForecastMetrics' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\GenerateForecastMetricsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'keyword_plan',
                        'fieldAccessors' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'GenerateForecastTimeSeries' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\GenerateForecastTimeSeriesResponse',
                'headerParams' => [
                    [
                        'keyName' => 'keyword_plan',
                        'fieldAccessors' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'GenerateHistoricalMetrics' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\GenerateHistoricalMetricsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'keyword_plan',
                        'fieldAccessors' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlans' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateKeywordPlansResponse',
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
                'keywordPlan' => 'customers/{customer_id}/keywordPlans/{keyword_plan_id}',
            ],
        ],
    ],
];

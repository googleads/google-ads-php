<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.KeywordPlanService' => [
            'GetKeywordPlan' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/keywordPlans/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlans' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/keywordPlans:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GenerateForecastCurve' => [
                'method' => 'post',
                'uriTemplate' => '/v5/{keyword_plan=customers/*/keywordPlans/*}:generateForecastCurve',
                'body' => '*',
                'placeholders' => [
                    'keyword_plan' => [
                        'getters' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'GenerateForecastTimeSeries' => [
                'method' => 'post',
                'uriTemplate' => '/v5/{keyword_plan=customers/*/keywordPlans/*}:generateForecastTimeSeries',
                'body' => '*',
                'placeholders' => [
                    'keyword_plan' => [
                        'getters' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'GenerateForecastMetrics' => [
                'method' => 'post',
                'uriTemplate' => '/v5/{keyword_plan=customers/*/keywordPlans/*}:generateForecastMetrics',
                'body' => '*',
                'placeholders' => [
                    'keyword_plan' => [
                        'getters' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
            'GenerateHistoricalMetrics' => [
                'method' => 'post',
                'uriTemplate' => '/v5/{keyword_plan=customers/*/keywordPlans/*}:generateHistoricalMetrics',
                'body' => '*',
                'placeholders' => [
                    'keyword_plan' => [
                        'getters' => [
                            'getKeywordPlan',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

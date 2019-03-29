<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.KeywordPlanService' => [
            'GetKeywordPlan' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/keywordPlans/*}',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/keywordPlans:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GenerateForecastMetrics' => [
                'method' => 'post',
                'uriTemplate' => '/v1/{keyword_plan=customers/*/keywordPlans/*}:generateForecastMetrics',
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
                'uriTemplate' => '/v1/{keyword_plan=customers/*/keywordPlans/*}:generateHistoricalMetrics',
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
        'google.longrunning.Operations' => [
            'CancelOperation' => [
                'method' => 'post',
                'uriTemplate' => '/v1/{name=customers/*/operations/*}:cancel',
                'body' => '*',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'DeleteOperation' => [
                'method' => 'delete',
                'uriTemplate' => '/v1/{name=customers/*/operations/*}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetOperation' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{name=customers/*/operations/*}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'ListOperations' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{name=customers/*/operations}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'WaitOperation' => [
                'method' => 'post',
                'uriTemplate' => '/v1/{name=customers/*/operations/*}:wait',
                'body' => '*',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

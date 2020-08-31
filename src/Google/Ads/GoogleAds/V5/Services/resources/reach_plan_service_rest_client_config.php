<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ReachPlanService' => [
            'ListPlannableLocations' => [
                'method' => 'post',
                'uriTemplate' => '/v5:listPlannableLocations',
                'body' => '*',
            ],
            'ListPlannableProducts' => [
                'method' => 'post',
                'uriTemplate' => '/v5:listPlannableProducts',
                'body' => '*',
            ],
            'GenerateProductMixIdeas' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}:generateProductMixIdeas',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GenerateReachForecast' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}:generateReachForecast',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

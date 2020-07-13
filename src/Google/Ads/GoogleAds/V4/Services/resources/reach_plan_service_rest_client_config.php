<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ReachPlanService' => [
            'ListPlannableLocations' => [
                'method' => 'post',
                'uriTemplate' => '/v4:listPlannableLocations',
                'body' => '*',
            ],
            'ListPlannableProducts' => [
                'method' => 'post',
                'uriTemplate' => '/v4:listPlannableProducts',
                'body' => '*',
            ],
            'GenerateProductMixIdeas' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}:generateProductMixIdeas',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}:generateReachForecast',
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

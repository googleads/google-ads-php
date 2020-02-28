<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.RecommendationService' => [
            'GetRecommendation' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/recommendations/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'ApplyRecommendation' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/recommendations:apply',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'DismissRecommendation' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/recommendations:dismiss',
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

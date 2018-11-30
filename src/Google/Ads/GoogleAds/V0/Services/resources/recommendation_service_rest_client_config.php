<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.RecommendationService' => [
            'GetRecommendation' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/recommendations/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/recommendations:apply',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/recommendations:dismiss',
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

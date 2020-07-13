<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.KeywordPlanIdeaService' => [
            'GenerateKeywordIdeas' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}:generateKeywordIdeas',
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

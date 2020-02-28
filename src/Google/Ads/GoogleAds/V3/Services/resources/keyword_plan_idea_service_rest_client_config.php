<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.KeywordPlanIdeaService' => [
            'GenerateKeywordIdeas' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}:generateKeywordIdeas',
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

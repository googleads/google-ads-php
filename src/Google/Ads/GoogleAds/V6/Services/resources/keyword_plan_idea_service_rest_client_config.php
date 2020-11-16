<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.KeywordPlanIdeaService' => [
            'GenerateKeywordIdeas' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}:generateKeywordIdeas',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.KeywordPlanIdeaService' => [
            'GenerateKeywordIdeas' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}:generateKeywordIdeas',
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

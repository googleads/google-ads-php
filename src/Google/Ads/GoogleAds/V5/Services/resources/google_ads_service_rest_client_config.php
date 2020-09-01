<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.GoogleAdsService' => [
            'Search' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/googleAds:search',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'Mutate' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/googleAds:mutate',
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

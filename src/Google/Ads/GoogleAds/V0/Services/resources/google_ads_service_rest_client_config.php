<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.GoogleAdsService' => [
            'Search' => [
                'method' => 'post',
                'uriTemplate' => '/v0/customers/{customer_id=*}/googleAds:search',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdService' => [
            'GetAd' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/ads/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAds' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/ads:mutate',
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

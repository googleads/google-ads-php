<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AdService' => [
            'GetAd' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/ads/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/ads:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdService' => [
            'GetAd' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/ads/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/ads:mutate',
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

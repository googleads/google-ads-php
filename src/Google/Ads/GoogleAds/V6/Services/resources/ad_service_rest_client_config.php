<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdService' => [
            'GetAd' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/ads/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/ads:mutate',
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

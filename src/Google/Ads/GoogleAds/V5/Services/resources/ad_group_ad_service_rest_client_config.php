<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AdGroupAdService' => [
            'GetAdGroupAd' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/adGroupAds/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupAds' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/adGroupAds:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupAdService' => [
            'GetAdGroupAd' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupAds/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupAds:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupAdService' => [
            'GetAdGroupAd' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupAds/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroupAds:mutate',
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

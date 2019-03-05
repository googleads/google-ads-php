<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdGroupBidModifierService' => [
            'GetAdGroupBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adGroupBidModifiers/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupBidModifiers' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/adGroupBidModifiers:mutate',
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

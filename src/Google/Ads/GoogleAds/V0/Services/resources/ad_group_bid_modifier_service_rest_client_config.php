<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AdGroupBidModifierService' => [
            'GetAdGroupBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/adGroupBidModifiers/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/adGroupBidModifiers:mutate',
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

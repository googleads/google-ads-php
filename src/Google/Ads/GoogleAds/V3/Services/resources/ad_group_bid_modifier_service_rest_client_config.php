<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupBidModifierService' => [
            'GetAdGroupBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupBidModifiers/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/adGroupBidModifiers:mutate',
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

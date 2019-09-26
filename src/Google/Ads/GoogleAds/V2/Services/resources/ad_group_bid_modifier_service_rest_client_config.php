<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupBidModifierService' => [
            'GetAdGroupBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupBidModifiers/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupBidModifiers:mutate',
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

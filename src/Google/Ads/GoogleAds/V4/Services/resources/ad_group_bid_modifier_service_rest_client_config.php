<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupBidModifierService' => [
            'GetAdGroupBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupBidModifiers/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroupBidModifiers:mutate',
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

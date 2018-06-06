<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AdGroupService' => [
            'GetAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/adGroups/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroups' => [
                'method' => 'post',
                'uriTemplate' => '/v0/customers/{customer_id=*}/adGroups:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupService' => [
            'GetAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroups/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/adGroups:mutate',
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

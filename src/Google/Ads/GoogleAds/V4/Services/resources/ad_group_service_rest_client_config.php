<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupService' => [
            'GetAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroups/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroups:mutate',
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

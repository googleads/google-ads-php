<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupService' => [
            'GetAdGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroups/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/adGroups:mutate',
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

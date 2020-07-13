<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.SharedSetService' => [
            'GetSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/sharedSets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateSharedSets' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/sharedSets:mutate',
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

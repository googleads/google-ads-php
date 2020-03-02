<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.SharedSetService' => [
            'GetSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/sharedSets/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/sharedSets:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.SharedSetService' => [
            'GetSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/sharedSets/*}',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/sharedSets:mutate',
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

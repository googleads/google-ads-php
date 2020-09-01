<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.SharedSetService' => [
            'GetSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/sharedSets/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/sharedSets:mutate',
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

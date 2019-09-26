<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.SharedSetService' => [
            'GetSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/sharedSets/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/sharedSets:mutate',
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

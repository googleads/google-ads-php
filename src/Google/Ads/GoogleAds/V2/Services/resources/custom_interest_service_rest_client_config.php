<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomInterestService' => [
            'GetCustomInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customInterests/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomInterests' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}/customInterests:mutate',
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

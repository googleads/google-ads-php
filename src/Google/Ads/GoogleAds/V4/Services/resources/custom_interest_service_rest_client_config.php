<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomInterestService' => [
            'GetCustomInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customInterests/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/customInterests:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AccountLinkService' => [
            'GetAccountLink' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/accountLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'CreateAccountLink' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/accountLinks:create',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'MutateAccountLink' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/accountLinks:mutate',
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

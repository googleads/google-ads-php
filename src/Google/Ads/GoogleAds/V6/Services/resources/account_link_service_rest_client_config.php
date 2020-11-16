<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AccountLinkService' => [
            'GetAccountLink' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/accountLinks/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/accountLinks:create',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/accountLinks:mutate',
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

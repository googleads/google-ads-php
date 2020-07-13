<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AccountLinkService' => [
            'GetAccountLink' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/accountLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAccountLink' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/accountLinks:mutate',
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

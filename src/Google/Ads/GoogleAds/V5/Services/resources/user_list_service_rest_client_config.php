<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.UserListService' => [
            'GetUserList' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/userLists/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateUserLists' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/userLists:mutate',
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

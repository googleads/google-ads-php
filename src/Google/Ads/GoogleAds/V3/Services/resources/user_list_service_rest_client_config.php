<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.UserListService' => [
            'GetUserList' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/userLists/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/userLists:mutate',
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

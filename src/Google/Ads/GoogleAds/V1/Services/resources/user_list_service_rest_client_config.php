<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.UserListService' => [
            'GetUserList' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/userLists/*}',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/userLists:mutate',
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

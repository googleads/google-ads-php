<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerManagerLinkService' => [
            'GetCustomerManagerLink' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerManagerLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerManagerLink' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerManagerLinks:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'MoveManagerLink' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerManagerLinks:moveManagerLink',
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

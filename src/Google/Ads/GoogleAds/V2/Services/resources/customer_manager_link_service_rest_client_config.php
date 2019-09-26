<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerManagerLinkService' => [
            'GetCustomerManagerLink' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customerManagerLinks/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/customerManagerLinks:mutate',
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

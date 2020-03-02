<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CustomerLabelService' => [
            'GetCustomerLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/customerLabels/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerLabels' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/customerLabels:mutate',
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

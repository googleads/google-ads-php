<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerLabelService' => [
            'GetCustomerLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerLabels/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerLabels:mutate',
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

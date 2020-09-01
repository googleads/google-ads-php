<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CustomerLabelService' => [
            'GetCustomerLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/customerLabels/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/customerLabels:mutate',
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

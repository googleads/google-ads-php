<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomerLabelService' => [
            'GetCustomerLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/customerLabels/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/customerLabels:mutate',
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

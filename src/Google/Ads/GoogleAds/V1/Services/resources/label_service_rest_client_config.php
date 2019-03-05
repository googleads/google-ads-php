<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.LabelService' => [
            'GetLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/labels/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateLabels' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/labels:mutate',
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

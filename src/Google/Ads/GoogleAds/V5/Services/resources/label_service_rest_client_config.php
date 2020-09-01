<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.LabelService' => [
            'GetLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/labels/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/labels:mutate',
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

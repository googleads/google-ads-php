<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.LabelService' => [
            'GetLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/labels/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/labels:mutate',
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

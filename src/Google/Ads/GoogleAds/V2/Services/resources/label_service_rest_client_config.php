<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.LabelService' => [
            'GetLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/labels/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/labels:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdParameterService' => [
            'GetAdParameter' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adParameters/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdParameters' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/adParameters:mutate',
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

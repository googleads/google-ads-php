<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdParameterService' => [
            'GetAdParameter' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adParameters/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adParameters:mutate',
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

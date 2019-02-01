<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AdParameterService' => [
            'GetAdParameter' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/adParameters/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/adParameters:mutate',
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

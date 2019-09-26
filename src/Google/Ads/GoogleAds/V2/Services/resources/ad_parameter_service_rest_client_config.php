<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdParameterService' => [
            'GetAdParameter' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adParameters/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adParameters:mutate',
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

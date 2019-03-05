<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ConversionActionService' => [
            'GetConversionAction' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/conversionActions/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateConversionActions' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/conversionActions:mutate',
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

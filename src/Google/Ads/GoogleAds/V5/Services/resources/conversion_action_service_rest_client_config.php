<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ConversionActionService' => [
            'GetConversionAction' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/conversionActions/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/conversionActions:mutate',
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

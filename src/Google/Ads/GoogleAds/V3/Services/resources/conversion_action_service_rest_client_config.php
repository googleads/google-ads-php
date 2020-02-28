<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ConversionActionService' => [
            'GetConversionAction' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/conversionActions/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/conversionActions:mutate',
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

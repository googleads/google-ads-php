<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ConversionActionService' => [
            'GetConversionAction' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/conversionActions/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/conversionActions:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ConversionUploadService' => [
            'UploadClickConversions' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}:uploadClickConversions',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'UploadCallConversions' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}:uploadCallConversions',
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

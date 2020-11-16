<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ConversionUploadService' => [
            'UploadClickConversions' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}:uploadClickConversions',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}:uploadCallConversions',
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

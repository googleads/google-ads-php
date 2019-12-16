<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}:uploadConversionAdjustments',
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

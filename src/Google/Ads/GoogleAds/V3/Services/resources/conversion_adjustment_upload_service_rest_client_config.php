<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}:uploadConversionAdjustments',
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

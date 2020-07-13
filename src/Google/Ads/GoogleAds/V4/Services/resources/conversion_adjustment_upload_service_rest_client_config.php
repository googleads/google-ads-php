<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}:uploadConversionAdjustments',
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

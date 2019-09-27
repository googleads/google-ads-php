<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}:uploadConversionAdjustments',
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

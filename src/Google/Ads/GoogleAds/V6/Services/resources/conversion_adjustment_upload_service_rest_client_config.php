<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}:uploadConversionAdjustments',
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

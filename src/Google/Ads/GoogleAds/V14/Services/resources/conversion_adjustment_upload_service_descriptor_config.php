<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\UploadConversionAdjustmentsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

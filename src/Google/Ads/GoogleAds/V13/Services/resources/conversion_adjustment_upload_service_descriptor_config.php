<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\UploadConversionAdjustmentsResponse',
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

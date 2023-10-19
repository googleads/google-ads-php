<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ConversionAdjustmentUploadService' => [
            'UploadConversionAdjustments' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\UploadConversionAdjustmentsResponse',
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

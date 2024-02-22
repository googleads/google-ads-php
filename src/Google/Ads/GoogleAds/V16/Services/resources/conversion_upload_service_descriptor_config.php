<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.ConversionUploadService' => [
            'UploadCallConversions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\UploadCallConversionsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'UploadClickConversions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\UploadClickConversionsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'conversionCustomVariable' => 'customers/{customer_id}/conversionCustomVariables/{conversion_custom_variable_id}',
            ],
        ],
    ],
];

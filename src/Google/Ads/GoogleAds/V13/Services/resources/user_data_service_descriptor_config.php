<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.UserDataService' => [
            'UploadUserData' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\UploadUserDataResponse',
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

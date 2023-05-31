<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\ListPaymentsAccountsResponse',
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

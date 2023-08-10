<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\ListPaymentsAccountsResponse',
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

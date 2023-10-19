<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.AccountLinkService' => [
            'CreateAccountLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\CreateAccountLinkResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'MutateAccountLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateAccountLinkResponse',
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
                'accountLink' => 'customers/{customer_id}/accountLinks/{account_link_id}',
                'customer' => 'customers/{customer_id}',
            ],
        ],
    ],
];

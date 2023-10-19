<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.BillingSetupService' => [
            'MutateBillingSetup' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateBillingSetupResponse',
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
                'billingSetup' => 'customers/{customer_id}/billingSetups/{billing_setup_id}',
                'paymentsAccount' => 'customers/{customer_id}/paymentsAccounts/{payments_account_id}',
            ],
        ],
    ],
];

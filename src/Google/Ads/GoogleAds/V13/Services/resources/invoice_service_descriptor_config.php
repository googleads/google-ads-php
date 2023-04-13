<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.InvoiceService' => [
            'ListInvoices' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\ListInvoicesResponse',
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

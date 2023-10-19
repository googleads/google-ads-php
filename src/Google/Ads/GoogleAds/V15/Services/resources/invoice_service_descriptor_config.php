<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.InvoiceService' => [
            'ListInvoices' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\ListInvoicesResponse',
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

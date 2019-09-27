<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.InvoiceService' => [
            'ListInvoices' => [
                'method' => 'get',
                'uriTemplate' => '/v2/customers/{customer_id=*}/invoices',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

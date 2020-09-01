<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.InvoiceService' => [
            'ListInvoices' => [
                'method' => 'get',
                'uriTemplate' => '/v5/customers/{customer_id=*}/invoices',
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

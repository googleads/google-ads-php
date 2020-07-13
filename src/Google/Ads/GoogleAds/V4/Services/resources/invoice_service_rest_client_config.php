<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.InvoiceService' => [
            'ListInvoices' => [
                'method' => 'get',
                'uriTemplate' => '/v4/customers/{customer_id=*}/invoices',
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

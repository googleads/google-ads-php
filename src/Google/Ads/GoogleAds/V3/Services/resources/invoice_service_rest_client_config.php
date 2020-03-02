<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.InvoiceService' => [
            'ListInvoices' => [
                'method' => 'get',
                'uriTemplate' => '/v3/customers/{customer_id=*}/invoices',
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

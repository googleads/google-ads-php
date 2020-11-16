<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.InvoiceService' => [
            'ListInvoices' => [
                'method' => 'get',
                'uriTemplate' => '/v6/customers/{customer_id=*}/invoices',
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

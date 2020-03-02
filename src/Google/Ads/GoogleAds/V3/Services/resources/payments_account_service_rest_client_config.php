<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'method' => 'get',
                'uriTemplate' => '/v3/customers/{customer_id=*}/paymentsAccounts',
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

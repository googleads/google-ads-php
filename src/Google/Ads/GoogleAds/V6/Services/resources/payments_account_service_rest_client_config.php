<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'method' => 'get',
                'uriTemplate' => '/v6/customers/{customer_id=*}/paymentsAccounts',
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

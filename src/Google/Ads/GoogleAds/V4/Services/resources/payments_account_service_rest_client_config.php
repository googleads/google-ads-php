<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'method' => 'get',
                'uriTemplate' => '/v4/customers/{customer_id=*}/paymentsAccounts',
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

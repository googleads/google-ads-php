<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'method' => 'get',
                'uriTemplate' => '/v1/customers/{customer_id=*}/paymentsAccounts',
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

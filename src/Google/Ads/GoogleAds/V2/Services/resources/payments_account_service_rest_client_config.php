<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.PaymentsAccountService' => [
            'ListPaymentsAccounts' => [
                'method' => 'get',
                'uriTemplate' => '/v2/customers/{customer_id=*}/paymentsAccounts',
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

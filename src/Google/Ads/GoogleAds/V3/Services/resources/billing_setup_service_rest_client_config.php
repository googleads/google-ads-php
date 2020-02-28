<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.BillingSetupService' => [
            'GetBillingSetup' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/billingSetups/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateBillingSetup' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/billingSetups:mutate',
                'body' => '*',
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

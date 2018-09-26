<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.BillingSetupService' => [
            'GetBillingSetup' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/billingSetups/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/billingSetups:mutate',
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

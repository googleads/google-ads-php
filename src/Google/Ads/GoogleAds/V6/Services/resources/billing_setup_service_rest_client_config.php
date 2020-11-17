<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.BillingSetupService' => [
            'GetBillingSetup' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/billingSetups/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/billingSetups:mutate',
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

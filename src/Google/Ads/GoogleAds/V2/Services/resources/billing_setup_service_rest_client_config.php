<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.BillingSetupService' => [
            'GetBillingSetup' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/billingSetups/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/billingSetups:mutate',
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

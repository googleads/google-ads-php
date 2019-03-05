<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CustomerExtensionSettingService' => [
            'GetCustomerExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/customerExtensionSettings/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomerExtensionSettings' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/customerExtensionSettings:mutate',
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

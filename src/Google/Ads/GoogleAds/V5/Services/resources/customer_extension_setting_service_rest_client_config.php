<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CustomerExtensionSettingService' => [
            'GetCustomerExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/customerExtensionSettings/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/customerExtensionSettings:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CustomerExtensionSettingService' => [
            'GetCustomerExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/customerExtensionSettings/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/customerExtensionSettings:mutate',
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

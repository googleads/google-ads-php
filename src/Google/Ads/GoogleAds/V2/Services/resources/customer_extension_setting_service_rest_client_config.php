<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CustomerExtensionSettingService' => [
            'GetCustomerExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/customerExtensionSettings/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/customerExtensionSettings:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdGroupExtensionSettingService' => [
            'GetAdGroupExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adGroupExtensionSettings/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupExtensionSettings' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/adGroupExtensionSettings:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupExtensionSettingService' => [
            'GetAdGroupExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupExtensionSettings/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroupExtensionSettings:mutate',
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

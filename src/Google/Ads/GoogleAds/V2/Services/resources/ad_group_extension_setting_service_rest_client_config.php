<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupExtensionSettingService' => [
            'GetAdGroupExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupExtensionSettings/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupExtensionSettings:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupExtensionSettingService' => [
            'GetAdGroupExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupExtensionSettings/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/adGroupExtensionSettings:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerExtensionSettingService' => [
            'MutateCustomerExtensionSettings' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerExtensionSettingsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'customerExtensionSetting' => 'customers/{customer_id}/customerExtensionSettings/{extension_type}',
                'extensionFeedItem' => 'customers/{customer_id}/extensionFeedItems/{feed_item_id}',
            ],
        ],
    ],
];

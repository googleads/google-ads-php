<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.AdGroupExtensionSettingService' => [
            'MutateAdGroupExtensionSettings' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateAdGroupExtensionSettingsResponse',
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
                'adGroup' => 'customers/{customer_id}/adGroups/{ad_group_id}',
                'adGroupExtensionSetting' => 'customers/{customer_id}/adGroupExtensionSettings/{ad_group_id}~{extension_type}',
                'extensionFeedItem' => 'customers/{customer_id}/extensionFeedItems/{feed_item_id}',
            ],
        ],
    ],
];

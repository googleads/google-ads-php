<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CampaignExtensionSettingService' => [
            'MutateCampaignExtensionSettings' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCampaignExtensionSettingsResponse',
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
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignExtensionSetting' => 'customers/{customer_id}/campaignExtensionSettings/{campaign_id}~{extension_type}',
                'extensionFeedItem' => 'customers/{customer_id}/extensionFeedItems/{feed_item_id}',
            ],
        ],
    ],
];

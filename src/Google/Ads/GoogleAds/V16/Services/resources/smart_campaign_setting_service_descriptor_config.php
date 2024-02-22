<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.SmartCampaignSettingService' => [
            'GetSmartCampaignStatus' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\GetSmartCampaignStatusResponse',
                'headerParams' => [
                    [
                        'keyName' => 'resource_name',
                        'fieldAccessors' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateSmartCampaignSettings' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateSmartCampaignSettingsResponse',
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
                'smartCampaignSetting' => 'customers/{customer_id}/smartCampaignSettings/{campaign_id}',
            ],
        ],
    ],
];

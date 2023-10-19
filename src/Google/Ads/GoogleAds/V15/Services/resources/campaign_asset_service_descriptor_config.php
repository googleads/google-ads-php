<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignAssetService' => [
            'MutateCampaignAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignAssetsResponse',
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
                'asset' => 'customers/{customer_id}/assets/{asset_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignAsset' => 'customers/{customer_id}/campaignAssets/{campaign_id}~{asset_id}~{field_type}',
            ],
        ],
    ],
];

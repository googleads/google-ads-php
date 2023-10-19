<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignAssetSetService' => [
            'MutateCampaignAssetSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignAssetSetsResponse',
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
                'assetSet' => 'customers/{customer_id}/assetSets/{asset_set_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignAssetSet' => 'customers/{customer_id}/campaignAssetSets/{campaign_id}~{asset_set_id}',
            ],
        ],
    ],
];

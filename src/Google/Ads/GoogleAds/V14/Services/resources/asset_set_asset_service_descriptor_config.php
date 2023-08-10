<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.AssetSetAssetService' => [
            'MutateAssetSetAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateAssetSetAssetsResponse',
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
                'assetSet' => 'customers/{customer_id}/assetSets/{asset_set_id}',
                'assetSetAsset' => 'customers/{customer_id}/assetSetAssets/{asset_set_id}~{asset_id}',
            ],
        ],
    ],
];

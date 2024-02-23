<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AssetGroupAssetService' => [
            'MutateAssetGroupAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAssetGroupAssetsResponse',
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
                'assetGroup' => 'customers/{customer_id}/assetGroups/{asset_group_id}',
                'assetGroupAsset' => 'customers/{customer_id}/assetGroupAssets/{asset_group_id}~{asset_id}~{field_type}',
            ],
        ],
    ],
];

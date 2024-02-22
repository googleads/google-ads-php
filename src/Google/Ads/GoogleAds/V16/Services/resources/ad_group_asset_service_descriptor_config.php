<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AdGroupAssetService' => [
            'MutateAdGroupAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAdGroupAssetsResponse',
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
                'adGroupAsset' => 'customers/{customer_id}/adGroupAssets/{ad_group_id}~{asset_id}~{field_type}',
                'asset' => 'customers/{customer_id}/assets/{asset_id}',
            ],
        ],
    ],
];

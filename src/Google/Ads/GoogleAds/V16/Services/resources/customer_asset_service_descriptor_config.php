<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerAssetService' => [
            'MutateCustomerAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerAssetsResponse',
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
                'customerAsset' => 'customers/{customer_id}/customerAssets/{asset_id}~{field_type}',
            ],
        ],
    ],
];

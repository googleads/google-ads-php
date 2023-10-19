<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.AssetSetService' => [
            'MutateAssetSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateAssetSetsResponse',
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
            ],
        ],
    ],
];

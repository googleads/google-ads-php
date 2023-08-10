<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.AssetGroupSignalService' => [
            'MutateAssetGroupSignals' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateAssetGroupSignalsResponse',
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
                'assetGroup' => 'customers/{customer_id}/assetGroups/{asset_group_id}',
                'assetGroupSignal' => 'customers/{customer_id}/assetGroupSignals/{asset_group_id}~{criterion_id}',
            ],
        ],
    ],
];

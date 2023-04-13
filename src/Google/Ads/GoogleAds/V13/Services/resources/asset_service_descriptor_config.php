<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.AssetService' => [
            'MutateAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateAssetsResponse',
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
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
            ],
        ],
    ],
];

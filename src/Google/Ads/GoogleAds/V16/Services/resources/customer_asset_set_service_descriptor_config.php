<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerAssetSetService' => [
            'MutateCustomerAssetSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerAssetSetsResponse',
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
                'customer' => 'customers/{customer_id}',
                'customerAssetSet' => 'customers/{customer_id}/customerAssetSets/{asset_set_id}',
            ],
        ],
    ],
];

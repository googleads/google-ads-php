<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.AdGroupAssetSetService' => [
            'MutateAdGroupAssetSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateAdGroupAssetSetsResponse',
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
                'adGroupAssetSet' => 'customers/{customer_id}/adGroupAssetSets/{ad_group_id}~{asset_set_id}',
                'assetSet' => 'customers/{customer_id}/assetSets/{asset_set_id}',
            ],
        ],
    ],
];

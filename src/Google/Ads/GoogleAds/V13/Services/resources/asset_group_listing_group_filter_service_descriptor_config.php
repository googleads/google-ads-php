<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.AssetGroupListingGroupFilterService' => [
            'MutateAssetGroupListingGroupFilters' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateAssetGroupListingGroupFiltersResponse',
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
                'assetGroupListingGroupFilter' => 'customers/{customer_id}/assetGroupListingGroupFilters/{asset_group_id}~{listing_group_filter_id}',
            ],
        ],
    ],
];

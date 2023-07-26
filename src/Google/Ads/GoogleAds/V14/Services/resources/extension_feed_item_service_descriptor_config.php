<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.ExtensionFeedItemService' => [
            'MutateExtensionFeedItems' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateExtensionFeedItemsResponse',
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
                'asset' => 'customers/{customer_id}/assets/{asset_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'extensionFeedItem' => 'customers/{customer_id}/extensionFeedItems/{feed_item_id}',
                'geoTargetConstant' => 'geoTargetConstants/{criterion_id}',
            ],
        ],
    ],
];

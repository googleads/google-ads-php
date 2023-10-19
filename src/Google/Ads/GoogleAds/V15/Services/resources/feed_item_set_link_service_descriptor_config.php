<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.FeedItemSetLinkService' => [
            'MutateFeedItemSetLinks' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateFeedItemSetLinksResponse',
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
                'feedItem' => 'customers/{customer_id}/feedItems/{feed_id}~{feed_item_id}',
                'feedItemSet' => 'customers/{customer_id}/feedItemSets/{feed_id}~{feed_item_set_id}',
                'feedItemSetLink' => 'customers/{customer_id}/feedItemSetLinks/{feed_id}~{feed_item_set_id}~{feed_item_id}',
            ],
        ],
    ],
];

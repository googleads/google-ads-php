<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.FeedItemService' => [
            'MutateFeedItems' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateFeedItemsResponse',
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
                'feed' => 'customers/{customer_id}/feeds/{feed_id}',
                'feedItem' => 'customers/{customer_id}/feedItems/{feed_id}~{feed_item_id}',
            ],
        ],
    ],
];

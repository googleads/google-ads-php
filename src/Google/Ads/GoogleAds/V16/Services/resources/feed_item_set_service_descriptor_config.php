<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.FeedItemSetService' => [
            'MutateFeedItemSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateFeedItemSetsResponse',
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
                'feedItemSet' => 'customers/{customer_id}/feedItemSets/{feed_id}~{feed_item_set_id}',
            ],
        ],
    ],
];

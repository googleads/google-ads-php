<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.FeedItemTargetService' => [
            'MutateFeedItemTargets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateFeedItemTargetsResponse',
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
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'feedItem' => 'customers/{customer_id}/feedItems/{feed_id}~{feed_item_id}',
                'feedItemTarget' => 'customers/{customer_id}/feedItemTargets/{feed_id}~{feed_item_id}~{feed_item_target_type}~{feed_item_target_id}',
                'geoTargetConstant' => 'geoTargetConstants/{criterion_id}',
            ],
        ],
    ],
];

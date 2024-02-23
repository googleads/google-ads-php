<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AdGroupFeedService' => [
            'MutateAdGroupFeeds' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAdGroupFeedsResponse',
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
                'adGroupFeed' => 'customers/{customer_id}/adGroupFeeds/{ad_group_id}~{feed_id}',
                'feed' => 'customers/{customer_id}/feeds/{feed_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CustomerFeedService' => [
            'MutateCustomerFeeds' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCustomerFeedsResponse',
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
                'customerFeed' => 'customers/{customer_id}/customerFeeds/{feed_id}',
                'feed' => 'customers/{customer_id}/feeds/{feed_id}',
            ],
        ],
    ],
];

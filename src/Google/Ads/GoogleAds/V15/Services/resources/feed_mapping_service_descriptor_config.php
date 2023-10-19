<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.FeedMappingService' => [
            'MutateFeedMappings' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateFeedMappingsResponse',
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
                'feedMapping' => 'customers/{customer_id}/feedMappings/{feed_id}~{feed_mapping_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.TravelAssetSuggestionService' => [
            'SuggestTravelAssets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\SuggestTravelAssetsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

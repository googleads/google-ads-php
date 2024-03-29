<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.GoogleAdsFieldService' => [
            'GetGoogleAdsField' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Resources\GoogleAdsField',
                'headerParams' => [
                    [
                        'keyName' => 'resource_name',
                        'fieldAccessors' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'SearchGoogleAdsFields' => [
                'pageStreaming' => [
                    'requestPageTokenGetMethod' => 'getPageToken',
                    'requestPageTokenSetMethod' => 'setPageToken',
                    'requestPageSizeGetMethod' => 'getPageSize',
                    'requestPageSizeSetMethod' => 'setPageSize',
                    'responsePageTokenGetMethod' => 'getNextPageToken',
                    'resourcesGetMethod' => 'getResults',
                ],
                'callType' => \Google\ApiCore\Call::PAGINATED_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\SearchGoogleAdsFieldsResponse',
            ],
            'templateMap' => [
                'googleAdsField' => 'googleAdsFields/{google_ads_field}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.ThirdPartyAppAnalyticsLinkService' => [
            'RegenerateShareableLinkId' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\RegenerateShareableLinkIdResponse',
                'headerParams' => [
                    [
                        'keyName' => 'resource_name',
                        'fieldAccessors' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'thirdPartyAppAnalyticsLink' => 'customers/{customer_id}/thirdPartyAppAnalyticsLinks/{customer_link_id}',
            ],
        ],
    ],
];

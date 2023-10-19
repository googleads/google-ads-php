<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ThirdPartyAppAnalyticsLinkService' => [
            'RegenerateShareableLinkId' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\RegenerateShareableLinkIdResponse',
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

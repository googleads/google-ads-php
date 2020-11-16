<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ThirdPartyAppAnalyticsLinkService' => [
            'GetThirdPartyAppAnalyticsLink' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/thirdPartyAppAnalyticsLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'RegenerateShareableLinkId' => [
                'method' => 'post',
                'uriTemplate' => '/v6/{resource_name=customers/*/thirdPartyAppAnalyticsLinks/*}:regenerateShareableLinkId',
                'body' => '*',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

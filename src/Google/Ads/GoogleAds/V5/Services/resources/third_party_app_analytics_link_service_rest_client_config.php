<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ThirdPartyAppAnalyticsLinkService' => [
            'GetThirdPartyAppAnalyticsLink' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/thirdPartyAppAnalyticsLinks/*}',
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
                'uriTemplate' => '/v5/{resource_name=customers/*/thirdPartyAppAnalyticsLinks/*}:regenerateShareableLinkId',
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

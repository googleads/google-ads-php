<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ThirdPartyAppAnalyticsLinkService' => [
            'GetThirdPartyAppAnalyticsLink' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/thirdPartyAppAnalyticsLinks/*}',
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

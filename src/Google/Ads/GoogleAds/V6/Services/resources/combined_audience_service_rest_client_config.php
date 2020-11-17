<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CombinedAudienceService' => [
            'GetCombinedAudience' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/combinedAudiences/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.DynamicSearchAdsSearchTermViewService' => [
            'GetDynamicSearchAdsSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/dynamicSearchAdsSearchTermViews/*}',
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

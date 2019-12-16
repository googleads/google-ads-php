<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.DynamicSearchAdsSearchTermViewService' => [
            'GetDynamicSearchAdsSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/dynamicSearchAdsSearchTermViews/*}',
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

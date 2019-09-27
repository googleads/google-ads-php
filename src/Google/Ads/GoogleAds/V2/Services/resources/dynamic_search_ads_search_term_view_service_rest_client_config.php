<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.DynamicSearchAdsSearchTermViewService' => [
            'GetDynamicSearchAdsSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/dynamicSearchAdsSearchTermViews/*}',
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

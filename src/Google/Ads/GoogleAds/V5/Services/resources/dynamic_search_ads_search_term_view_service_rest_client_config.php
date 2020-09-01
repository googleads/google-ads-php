<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.DynamicSearchAdsSearchTermViewService' => [
            'GetDynamicSearchAdsSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/dynamicSearchAdsSearchTermViews/*}',
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

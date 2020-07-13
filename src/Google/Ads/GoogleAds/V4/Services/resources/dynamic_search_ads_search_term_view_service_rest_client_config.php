<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.DynamicSearchAdsSearchTermViewService' => [
            'GetDynamicSearchAdsSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/dynamicSearchAdsSearchTermViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupAdAssetViewService' => [
            'GetAdGroupAdAssetView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupAdAssetViews/*}',
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

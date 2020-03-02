<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupAdAssetViewService' => [
            'GetAdGroupAdAssetView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupAdAssetViews/*}',
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

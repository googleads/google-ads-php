<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AdGroupAdAssetViewService' => [
            'GetAdGroupAdAssetView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/adGroupAdAssetViews/*}',
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

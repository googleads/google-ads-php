<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupAdAssetViewService' => [
            'GetAdGroupAdAssetView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupAdAssetViews/*}',
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

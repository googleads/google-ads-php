<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupAdAssetViewService' => [
            'GetAdGroupAdAssetView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupAdAssetViews/*}',
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

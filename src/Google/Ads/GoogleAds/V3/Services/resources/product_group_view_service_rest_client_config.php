<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ProductGroupViewService' => [
            'GetProductGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/productGroupViews/*}',
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

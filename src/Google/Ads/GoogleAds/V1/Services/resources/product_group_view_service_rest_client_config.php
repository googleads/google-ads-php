<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ProductGroupViewService' => [
            'GetProductGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/productGroupViews/*}',
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

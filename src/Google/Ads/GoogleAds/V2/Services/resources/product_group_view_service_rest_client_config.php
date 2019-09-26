<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ProductGroupViewService' => [
            'GetProductGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/productGroupViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ProductGroupViewService' => [
            'GetProductGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/productGroupViews/*}',
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

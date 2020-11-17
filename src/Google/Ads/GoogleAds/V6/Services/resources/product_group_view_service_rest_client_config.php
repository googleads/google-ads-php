<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ProductGroupViewService' => [
            'GetProductGroupView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/productGroupViews/*}',
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

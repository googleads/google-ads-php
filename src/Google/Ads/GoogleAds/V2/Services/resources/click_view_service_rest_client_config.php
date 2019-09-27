<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ClickViewService' => [
            'GetClickView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/clickViews/*}',
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

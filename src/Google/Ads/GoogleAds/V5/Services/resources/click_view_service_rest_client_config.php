<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ClickViewService' => [
            'GetClickView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/clickViews/*}',
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

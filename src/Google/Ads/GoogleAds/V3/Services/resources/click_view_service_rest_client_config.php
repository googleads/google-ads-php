<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ClickViewService' => [
            'GetClickView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/clickViews/*}',
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

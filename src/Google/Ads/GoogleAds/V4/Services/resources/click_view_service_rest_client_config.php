<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ClickViewService' => [
            'GetClickView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/clickViews/*}',
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

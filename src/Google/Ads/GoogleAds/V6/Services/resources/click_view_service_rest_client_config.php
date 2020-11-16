<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ClickViewService' => [
            'GetClickView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/clickViews/*}',
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

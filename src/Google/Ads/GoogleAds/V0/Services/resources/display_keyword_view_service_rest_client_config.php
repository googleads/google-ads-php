<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.DisplayKeywordViewService' => [
            'GetDisplayKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/displayKeywordViews/*}',
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

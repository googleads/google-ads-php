<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.DisplayKeywordViewService' => [
            'GetDisplayKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/displayKeywordViews/*}',
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

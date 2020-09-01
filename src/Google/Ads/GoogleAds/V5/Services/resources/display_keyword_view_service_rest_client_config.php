<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.DisplayKeywordViewService' => [
            'GetDisplayKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/displayKeywordViews/*}',
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

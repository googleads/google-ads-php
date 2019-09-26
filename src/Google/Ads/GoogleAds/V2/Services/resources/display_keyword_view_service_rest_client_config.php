<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.DisplayKeywordViewService' => [
            'GetDisplayKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/displayKeywordViews/*}',
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

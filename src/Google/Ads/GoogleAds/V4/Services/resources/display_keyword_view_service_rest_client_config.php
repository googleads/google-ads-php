<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.DisplayKeywordViewService' => [
            'GetDisplayKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/displayKeywordViews/*}',
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

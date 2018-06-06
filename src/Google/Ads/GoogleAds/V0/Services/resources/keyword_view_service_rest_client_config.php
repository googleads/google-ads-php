<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.KeywordViewService' => [
            'GetKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/keywordViews/*}',
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

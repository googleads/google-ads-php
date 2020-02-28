<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.KeywordViewService' => [
            'GetKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/keywordViews/*}',
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

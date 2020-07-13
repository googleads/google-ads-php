<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.KeywordViewService' => [
            'GetKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/keywordViews/*}',
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

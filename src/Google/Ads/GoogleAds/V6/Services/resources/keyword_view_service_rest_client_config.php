<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.KeywordViewService' => [
            'GetKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/keywordViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.KeywordViewService' => [
            'GetKeywordView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/keywordViews/*}',
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

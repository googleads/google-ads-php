<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.SearchTermViewService' => [
            'GetSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/searchTermViews/*}',
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

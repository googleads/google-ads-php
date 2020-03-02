<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.SearchTermViewService' => [
            'GetSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/searchTermViews/*}',
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

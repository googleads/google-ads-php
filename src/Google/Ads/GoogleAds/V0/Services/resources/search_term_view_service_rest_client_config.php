<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.SearchTermViewService' => [
            'GetSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/searchTermViews/*}',
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

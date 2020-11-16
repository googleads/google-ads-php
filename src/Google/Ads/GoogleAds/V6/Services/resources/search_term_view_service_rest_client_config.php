<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.SearchTermViewService' => [
            'GetSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/searchTermViews/*}',
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

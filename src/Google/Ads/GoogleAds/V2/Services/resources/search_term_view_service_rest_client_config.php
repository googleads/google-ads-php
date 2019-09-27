<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.SearchTermViewService' => [
            'GetSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/searchTermViews/*}',
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

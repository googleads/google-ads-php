<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.FeedPlaceholderViewService' => [
            'GetFeedPlaceholderView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/feedPlaceholderViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.FeedPlaceholderViewService' => [
            'GetFeedPlaceholderView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/feedPlaceholderViews/*}',
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

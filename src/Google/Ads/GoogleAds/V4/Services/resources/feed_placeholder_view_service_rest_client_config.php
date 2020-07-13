<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.FeedPlaceholderViewService' => [
            'GetFeedPlaceholderView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/feedPlaceholderViews/*}',
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

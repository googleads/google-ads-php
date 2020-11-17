<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.FeedPlaceholderViewService' => [
            'GetFeedPlaceholderView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/feedPlaceholderViews/*}',
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

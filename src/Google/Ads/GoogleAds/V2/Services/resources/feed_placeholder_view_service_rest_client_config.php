<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.FeedPlaceholderViewService' => [
            'GetFeedPlaceholderView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/feedPlaceholderViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.TopicViewService' => [
            'GetTopicView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/topicViews/*}',
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

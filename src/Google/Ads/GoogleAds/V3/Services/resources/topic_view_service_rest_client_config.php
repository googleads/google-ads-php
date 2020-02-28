<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.TopicViewService' => [
            'GetTopicView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/topicViews/*}',
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

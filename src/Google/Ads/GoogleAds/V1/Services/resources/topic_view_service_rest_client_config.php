<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.TopicViewService' => [
            'GetTopicView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/topicViews/*}',
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

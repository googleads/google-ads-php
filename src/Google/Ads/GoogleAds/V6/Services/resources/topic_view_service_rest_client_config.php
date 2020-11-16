<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.TopicViewService' => [
            'GetTopicView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/topicViews/*}',
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

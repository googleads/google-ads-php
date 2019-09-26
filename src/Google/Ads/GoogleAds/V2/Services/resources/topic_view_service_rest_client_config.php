<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.TopicViewService' => [
            'GetTopicView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/topicViews/*}',
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

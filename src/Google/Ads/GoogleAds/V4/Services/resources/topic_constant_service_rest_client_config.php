<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.TopicConstantService' => [
            'GetTopicConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=topicConstants/*}',
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

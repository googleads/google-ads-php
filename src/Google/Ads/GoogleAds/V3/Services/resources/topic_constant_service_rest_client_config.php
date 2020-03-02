<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.TopicConstantService' => [
            'GetTopicConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=topicConstants/*}',
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

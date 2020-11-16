<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.TopicConstantService' => [
            'GetTopicConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=topicConstants/*}',
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

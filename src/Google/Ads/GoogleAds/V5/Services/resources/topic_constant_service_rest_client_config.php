<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.TopicConstantService' => [
            'GetTopicConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=topicConstants/*}',
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

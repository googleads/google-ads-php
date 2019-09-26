<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.TopicConstantService' => [
            'GetTopicConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=topicConstants/*}',
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

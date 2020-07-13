<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.UserInterestService' => [
            'GetUserInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/userInterests/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.UserInterestService' => [
            'GetUserInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/userInterests/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.UserInterestService' => [
            'GetUserInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/userInterests/*}',
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

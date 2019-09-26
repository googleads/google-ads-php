<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.UserInterestService' => [
            'GetUserInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/userInterests/*}',
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

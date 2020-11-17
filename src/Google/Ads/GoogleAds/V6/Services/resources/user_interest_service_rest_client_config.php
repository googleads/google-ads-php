<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.UserInterestService' => [
            'GetUserInterest' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/userInterests/*}',
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

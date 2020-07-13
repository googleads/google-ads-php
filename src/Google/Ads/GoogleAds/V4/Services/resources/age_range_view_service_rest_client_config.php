<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AgeRangeViewService' => [
            'GetAgeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/ageRangeViews/*}',
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

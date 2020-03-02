<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AgeRangeViewService' => [
            'GetAgeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/ageRangeViews/*}',
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

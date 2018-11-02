<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AgeRangeViewService' => [
            'GetAgeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/ageRangeViews/*}',
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

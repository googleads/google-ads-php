<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AgeRangeViewService' => [
            'GetAgeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/ageRangeViews/*}',
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

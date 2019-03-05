<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.GenderViewService' => [
            'GetGenderView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/genderViews/*}',
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

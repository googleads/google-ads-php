<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.GenderViewService' => [
            'GetGenderView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/genderViews/*}',
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

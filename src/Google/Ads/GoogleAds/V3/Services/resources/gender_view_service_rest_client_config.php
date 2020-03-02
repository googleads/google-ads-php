<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.GenderViewService' => [
            'GetGenderView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/genderViews/*}',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.GenderViewService' => [
            'GetGenderView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/genderViews/*}',
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

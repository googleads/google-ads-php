<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.GenderViewService' => [
            'GetGenderView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/genderViews/*}',
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

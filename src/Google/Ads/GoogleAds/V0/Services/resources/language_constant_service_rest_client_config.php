<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.LanguageConstantService' => [
            'GetLanguageConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=languageConstants/*}',
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

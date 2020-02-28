<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.LanguageConstantService' => [
            'GetLanguageConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=languageConstants/*}',
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

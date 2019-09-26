<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.LanguageConstantService' => [
            'GetLanguageConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=languageConstants/*}',
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

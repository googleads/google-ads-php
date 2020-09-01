<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.LanguageConstantService' => [
            'GetLanguageConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=languageConstants/*}',
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

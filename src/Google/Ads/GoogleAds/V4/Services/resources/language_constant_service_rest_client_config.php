<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.LanguageConstantService' => [
            'GetLanguageConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=languageConstants/*}',
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

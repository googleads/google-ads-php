<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CurrencyConstantService' => [
            'GetCurrencyConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=currencyConstants/*}',
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

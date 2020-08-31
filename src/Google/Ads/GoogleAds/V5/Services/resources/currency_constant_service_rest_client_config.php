<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CurrencyConstantService' => [
            'GetCurrencyConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=currencyConstants/*}',
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

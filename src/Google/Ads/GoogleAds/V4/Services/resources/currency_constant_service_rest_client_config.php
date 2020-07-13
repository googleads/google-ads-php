<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CurrencyConstantService' => [
            'GetCurrencyConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=currencyConstants/*}',
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

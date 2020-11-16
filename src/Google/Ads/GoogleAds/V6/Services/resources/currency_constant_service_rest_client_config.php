<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CurrencyConstantService' => [
            'GetCurrencyConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=currencyConstants/*}',
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

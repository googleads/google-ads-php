<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AccountBudgetService' => [
            'GetAccountBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/accountBudgets/*}',
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

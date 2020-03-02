<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AccountBudgetService' => [
            'GetAccountBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/accountBudgets/*}',
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

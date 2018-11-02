<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AccountBudgetService' => [
            'GetAccountBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/accountBudgets/*}',
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

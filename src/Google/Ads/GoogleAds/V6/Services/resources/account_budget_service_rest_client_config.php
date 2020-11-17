<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AccountBudgetService' => [
            'GetAccountBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/accountBudgets/*}',
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

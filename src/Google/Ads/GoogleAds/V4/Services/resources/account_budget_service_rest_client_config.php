<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AccountBudgetService' => [
            'GetAccountBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/accountBudgets/*}',
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

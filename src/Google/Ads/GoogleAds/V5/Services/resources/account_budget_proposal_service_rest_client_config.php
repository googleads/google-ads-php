<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AccountBudgetProposalService' => [
            'GetAccountBudgetProposal' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/accountBudgetProposals/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAccountBudgetProposal' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/accountBudgetProposals:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

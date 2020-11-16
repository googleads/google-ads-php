<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AccountBudgetProposalService' => [
            'GetAccountBudgetProposal' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/accountBudgetProposals/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/accountBudgetProposals:mutate',
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

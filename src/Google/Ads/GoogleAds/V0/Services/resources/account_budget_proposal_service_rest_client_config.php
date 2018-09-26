<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AccountBudgetProposalService' => [
            'GetAccountBudgetProposal' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/accountBudgetProposals/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/accountBudgetProposals:mutate',
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

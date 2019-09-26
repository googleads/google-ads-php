<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AccountBudgetProposalService' => [
            'GetAccountBudgetProposal' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/accountBudgetProposals/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/accountBudgetProposals:mutate',
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

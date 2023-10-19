<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.AccountBudgetProposalService' => [
            'MutateAccountBudgetProposal' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateAccountBudgetProposalResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'accountBudget' => 'customers/{customer_id}/accountBudgets/{account_budget_id}',
                'accountBudgetProposal' => 'customers/{customer_id}/accountBudgetProposals/{account_budget_proposal_id}',
                'billingSetup' => 'customers/{customer_id}/billingSetups/{billing_setup_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignBudgetService' => [
            'MutateCampaignBudgets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignBudgetsResponse',
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
                'campaignBudget' => 'customers/{customer_id}/campaignBudgets/{campaign_budget_id}',
            ],
        ],
    ],
];

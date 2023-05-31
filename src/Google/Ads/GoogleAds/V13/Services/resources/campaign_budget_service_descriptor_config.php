<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CampaignBudgetService' => [
            'MutateCampaignBudgets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCampaignBudgetsResponse',
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

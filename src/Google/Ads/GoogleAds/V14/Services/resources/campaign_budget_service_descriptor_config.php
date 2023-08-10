<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CampaignBudgetService' => [
            'MutateCampaignBudgets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCampaignBudgetsResponse',
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

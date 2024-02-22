<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CampaignService' => [
            'MutateCampaigns' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCampaignsResponse',
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
                'accessibleBiddingStrategy' => 'customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}',
                'assetSet' => 'customers/{customer_id}/assetSets/{asset_set_id}',
                'biddingStrategy' => 'customers/{customer_id}/biddingStrategies/{bidding_strategy_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignBudget' => 'customers/{customer_id}/campaignBudgets/{campaign_budget_id}',
                'campaignGroup' => 'customers/{customer_id}/campaignGroups/{campaign_group_id}',
                'campaignLabel' => 'customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}',
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
                'feed' => 'customers/{customer_id}/feeds/{feed_id}',
            ],
        ],
    ],
];

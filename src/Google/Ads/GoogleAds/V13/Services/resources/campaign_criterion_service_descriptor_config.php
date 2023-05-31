<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CampaignCriterionService' => [
            'MutateCampaignCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCampaignCriteriaResponse',
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
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'campaignCriterion' => 'customers/{customer_id}/campaignCriteria/{campaign_id}~{criterion_id}',
            ],
        ],
    ],
];

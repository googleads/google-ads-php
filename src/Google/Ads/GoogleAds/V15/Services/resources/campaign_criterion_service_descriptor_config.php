<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignCriterionService' => [
            'MutateCampaignCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignCriteriaResponse',
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
                'combinedAudience' => 'customers/{customer_id}/combinedAudiences/{combined_audience_id}',
                'mobileAppCategoryConstant' => 'mobileAppCategoryConstants/{mobile_app_category_id}',
                'topicConstant' => 'topicConstants/{topic_id}',
            ],
        ],
    ],
];

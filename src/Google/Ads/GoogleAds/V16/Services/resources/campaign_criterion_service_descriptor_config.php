<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CampaignCriterionService' => [
            'MutateCampaignCriteria' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCampaignCriteriaResponse',
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
                'carrierConstant' => 'carrierConstants/{criterion_id}',
                'combinedAudience' => 'customers/{customer_id}/combinedAudiences/{combined_audience_id}',
                'keywordThemeConstant' => 'keywordThemeConstants/{express_category_id}~{express_sub_category_id}',
                'mobileAppCategoryConstant' => 'mobileAppCategoryConstants/{mobile_app_category_id}',
                'mobileDeviceConstant' => 'mobileDeviceConstants/{criterion_id}',
                'operatingSystemVersionConstant' => 'operatingSystemVersionConstants/{criterion_id}',
                'topicConstant' => 'topicConstants/{topic_id}',
            ],
        ],
    ],
];

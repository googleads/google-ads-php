<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.SmartCampaignSuggestService' => [
            'SuggestKeywordThemes' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\SuggestKeywordThemesResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'SuggestSmartCampaignAd' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\SuggestSmartCampaignAdResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'SuggestSmartCampaignBudgetOptions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\SuggestSmartCampaignBudgetOptionsResponse',
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
            ],
        ],
    ],
];

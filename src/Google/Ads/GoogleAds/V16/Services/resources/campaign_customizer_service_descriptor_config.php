<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CampaignCustomizerService' => [
            'MutateCampaignCustomizers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCampaignCustomizersResponse',
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
                'campaignCustomizer' => 'customers/{customer_id}/campaignCustomizers/{campaign_id}~{customizer_attribute_id}',
                'customizerAttribute' => 'customers/{customer_id}/customizerAttributes/{customizer_attribute_id}',
            ],
        ],
    ],
];

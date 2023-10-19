<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignLabelService' => [
            'MutateCampaignLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignLabelsResponse',
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
                'campaignLabel' => 'customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}',
                'label' => 'customers/{customer_id}/labels/{label_id}',
            ],
        ],
    ],
];

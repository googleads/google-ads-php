<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CampaignGroupService' => [
            'MutateCampaignGroups' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCampaignGroupsResponse',
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
                'campaignGroup' => 'customers/{customer_id}/campaignGroups/{campaign_group_id}',
            ],
        ],
    ],
];

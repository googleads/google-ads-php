<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CampaignGroupService' => [
            'MutateCampaignGroups' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCampaignGroupsResponse',
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

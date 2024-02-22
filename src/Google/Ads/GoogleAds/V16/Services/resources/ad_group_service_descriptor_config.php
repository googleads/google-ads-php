<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AdGroupService' => [
            'MutateAdGroups' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAdGroupsResponse',
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
                'adGroup' => 'customers/{customer_id}/adGroups/{ad_group_id}',
                'adGroupLabel' => 'customers/{customer_id}/adGroupLabels/{ad_group_id}~{label_id}',
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AdGroupAdService' => [
            'MutateAdGroupAds' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAdGroupAdsResponse',
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
                'ad' => 'customers/{customer_id}/ads/{ad_id}',
                'adGroup' => 'customers/{customer_id}/adGroups/{ad_group_id}',
                'adGroupAd' => 'customers/{customer_id}/adGroupAds/{ad_group_id}~{ad_id}',
                'adGroupAdLabel' => 'customers/{customer_id}/adGroupAdLabels/{ad_group_id}~{ad_id}~{label_id}',
            ],
        ],
    ],
];

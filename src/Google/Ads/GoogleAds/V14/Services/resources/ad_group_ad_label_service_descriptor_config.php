<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.AdGroupAdLabelService' => [
            'MutateAdGroupAdLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateAdGroupAdLabelsResponse',
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
                'adGroupAd' => 'customers/{customer_id}/adGroupAds/{ad_group_id}~{ad_id}',
                'adGroupAdLabel' => 'customers/{customer_id}/adGroupAdLabels/{ad_group_id}~{ad_id}~{label_id}',
                'label' => 'customers/{customer_id}/labels/{label_id}',
            ],
        ],
    ],
];

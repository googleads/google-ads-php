<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.AdGroupLabelService' => [
            'MutateAdGroupLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateAdGroupLabelsResponse',
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
                'label' => 'customers/{customer_id}/labels/{label_id}',
            ],
        ],
    ],
];

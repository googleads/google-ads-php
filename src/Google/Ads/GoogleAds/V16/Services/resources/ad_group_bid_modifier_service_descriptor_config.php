<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AdGroupBidModifierService' => [
            'MutateAdGroupBidModifiers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAdGroupBidModifiersResponse',
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
                'adGroupBidModifier' => 'customers/{customer_id}/adGroupBidModifiers/{ad_group_id}~{criterion_id}',
            ],
        ],
    ],
];

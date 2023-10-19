<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.AdGroupBidModifierService' => [
            'MutateAdGroupBidModifiers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateAdGroupBidModifiersResponse',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.AdGroupCustomizerService' => [
            'MutateAdGroupCustomizers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateAdGroupCustomizersResponse',
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
                'adGroupCustomizer' => 'customers/{customer_id}/adGroupCustomizers/{ad_group_id}~{customizer_attribute_id}',
                'customizerAttribute' => 'customers/{customer_id}/customizerAttributes/{customizer_attribute_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomizerAttributeService' => [
            'MutateCustomizerAttributes' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomizerAttributesResponse',
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
                'customizerAttribute' => 'customers/{customer_id}/customizerAttributes/{customizer_attribute_id}',
            ],
        ],
    ],
];

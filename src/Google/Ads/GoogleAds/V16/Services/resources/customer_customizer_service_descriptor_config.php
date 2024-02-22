<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerCustomizerService' => [
            'MutateCustomerCustomizers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerCustomizersResponse',
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
                'customerCustomizer' => 'customers/{customer_id}/customerCustomizers/{customizer_attribute_id}',
                'customizerAttribute' => 'customers/{customer_id}/customizerAttributes/{customizer_attribute_id}',
            ],
        ],
    ],
];

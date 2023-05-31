<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CustomerSkAdNetworkConversionValueSchemaService' => [
            'MutateCustomerSkAdNetworkConversionValueSchema' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCustomerSkAdNetworkConversionValueSchemaResponse',
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
                'customerSkAdNetworkConversionValueSchema' => 'customers/{customer_id}/customerSkAdNetworkConversionValueSchemas/{account_link_id}',
            ],
        ],
    ],
];

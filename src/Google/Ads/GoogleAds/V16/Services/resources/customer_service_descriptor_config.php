<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerService' => [
            'CreateCustomerClient' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\CreateCustomerClientResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'ListAccessibleCustomers' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\ListAccessibleCustomersResponse',
            ],
            'MutateCustomer' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerResponse',
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
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
                'customer' => 'customers/{customer_id}',
            ],
        ],
    ],
];

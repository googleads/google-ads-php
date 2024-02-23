<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.CustomerUserAccessService' => [
            'MutateCustomerUserAccess' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateCustomerUserAccessResponse',
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
                'customerUserAccess' => 'customers/{customer_id}/customerUserAccesses/{user_id}',
            ],
        ],
    ],
];

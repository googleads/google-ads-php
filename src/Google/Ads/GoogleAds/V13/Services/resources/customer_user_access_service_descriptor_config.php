<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CustomerUserAccessService' => [
            'MutateCustomerUserAccess' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCustomerUserAccessResponse',
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

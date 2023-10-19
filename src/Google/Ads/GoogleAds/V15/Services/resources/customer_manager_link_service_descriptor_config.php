<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CustomerManagerLinkService' => [
            'MoveManagerLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MoveManagerLinkResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'MutateCustomerManagerLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCustomerManagerLinkResponse',
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
                'customer' => 'customers/{customer_id}',
                'customerManagerLink' => 'customers/{customer_id}/customerManagerLinks/{manager_customer_id}~{manager_link_id}',
            ],
        ],
    ],
];

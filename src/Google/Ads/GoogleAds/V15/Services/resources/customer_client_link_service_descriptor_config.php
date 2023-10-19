<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CustomerClientLinkService' => [
            'MutateCustomerClientLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCustomerClientLinkResponse',
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
                'customerClientLink' => 'customers/{customer_id}/customerClientLinks/{client_customer_id}~{manager_link_id}',
            ],
        ],
    ],
];

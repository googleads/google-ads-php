<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.CustomerUserAccessInvitationService' => [
            'MutateCustomerUserAccessInvitation' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateCustomerUserAccessInvitationResponse',
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
                'customerUserAccessInvitation' => 'customers/{customer_id}/customerUserAccessInvitations/{invitation_id}',
            ],
        ],
    ],
];

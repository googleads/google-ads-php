<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ProductLinkInvitationService' => [
            'UpdateProductLinkInvitation' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\UpdateProductLinkInvitationResponse',
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
                'productLinkInvitation' => 'customers/{customer_id}/productLinkInvitations/{customer_invitation_id}',
            ],
        ],
    ],
];

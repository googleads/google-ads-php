<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.RemarketingActionService' => [
            'MutateRemarketingActions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateRemarketingActionsResponse',
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
                'remarketingAction' => 'customers/{customer_id}/remarketingActions/{remarketing_action_id}',
            ],
        ],
    ],
];

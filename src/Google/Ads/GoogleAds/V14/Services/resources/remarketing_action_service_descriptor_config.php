<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.RemarketingActionService' => [
            'MutateRemarketingActions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateRemarketingActionsResponse',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CustomInterestService' => [
            'MutateCustomInterests' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCustomInterestsResponse',
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
                'customInterest' => 'customers/{customer_id}/customInterests/{custom_interest_id}',
            ],
        ],
    ],
];

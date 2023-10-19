<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CustomInterestService' => [
            'MutateCustomInterests' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCustomInterestsResponse',
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

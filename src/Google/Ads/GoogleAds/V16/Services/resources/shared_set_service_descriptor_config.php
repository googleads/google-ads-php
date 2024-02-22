<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.SharedSetService' => [
            'MutateSharedSets' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateSharedSetsResponse',
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
                'sharedSet' => 'customers/{customer_id}/sharedSets/{shared_set_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.AudienceService' => [
            'MutateAudiences' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateAudiencesResponse',
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
                'audience' => 'customers/{customer_id}/audiences/{audience_id}',
            ],
        ],
    ],
];

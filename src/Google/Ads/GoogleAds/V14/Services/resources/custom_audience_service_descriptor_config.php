<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.CustomAudienceService' => [
            'MutateCustomAudiences' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateCustomAudiencesResponse',
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
                'customAudience' => 'customers/{customer_id}/customAudiences/{custom_audience_id}',
            ],
        ],
    ],
];

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.AudienceService' => [
            'MutateAudiences' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateAudiencesResponse',
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
                'detailedDemographic' => 'customers/{customer_id}/detailedDemographics/{detailed_demographic_id}',
                'lifeEvent' => 'customers/{customer_id}/lifeEvents/{life_event_id}',
            ],
        ],
    ],
];

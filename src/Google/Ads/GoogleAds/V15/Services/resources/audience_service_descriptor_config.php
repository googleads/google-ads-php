<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.AudienceService' => [
            'MutateAudiences' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateAudiencesResponse',
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
                'assetGroup' => 'customers/{customer_id}/assetGroups/{asset_group_id}',
                'audience' => 'customers/{customer_id}/audiences/{audience_id}',
            ],
        ],
    ],
];

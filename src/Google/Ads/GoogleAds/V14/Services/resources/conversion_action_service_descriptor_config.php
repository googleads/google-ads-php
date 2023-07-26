<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.ConversionActionService' => [
            'MutateConversionActions' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateConversionActionsResponse',
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
                'conversionAction' => 'customers/{customer_id}/conversionActions/{conversion_action_id}',
                'customer' => 'customers/{customer_id}',
            ],
        ],
    ],
];

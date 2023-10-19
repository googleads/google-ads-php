<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ConversionCustomVariableService' => [
            'MutateConversionCustomVariables' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateConversionCustomVariablesResponse',
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
                'conversionCustomVariable' => 'customers/{customer_id}/conversionCustomVariables/{conversion_custom_variable_id}',
                'customer' => 'customers/{customer_id}',
            ],
        ],
    ],
];

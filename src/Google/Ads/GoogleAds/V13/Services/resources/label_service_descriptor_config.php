<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.LabelService' => [
            'MutateLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateLabelsResponse',
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
                'label' => 'customers/{customer_id}/labels/{label_id}',
            ],
        ],
    ],
];

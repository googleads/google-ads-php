<?php

return [
    'interfaces' => [
        'google.ads.googleads.v14.services.LabelService' => [
            'MutateLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V14\Services\MutateLabelsResponse',
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

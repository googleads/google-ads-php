<?php

return [
    'interfaces' => [
        'google.ads.googleads.v16.services.LabelService' => [
            'MutateLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V16\Services\MutateLabelsResponse',
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

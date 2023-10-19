<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.CustomerLabelService' => [
            'MutateCustomerLabels' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateCustomerLabelsResponse',
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
                'customer' => 'customers/{customer_id}',
                'customerLabel' => 'customers/{customer_id}/customerLabels/{label_id}',
                'label' => 'customers/{customer_id}/labels/{label_id}',
            ],
        ],
    ],
];

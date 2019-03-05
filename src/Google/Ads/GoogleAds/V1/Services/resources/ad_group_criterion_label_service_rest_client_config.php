<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdGroupCriterionLabelService' => [
            'GetAdGroupCriterionLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adGroupCriterionLabels/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupCriterionLabels' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/adGroupCriterionLabels:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

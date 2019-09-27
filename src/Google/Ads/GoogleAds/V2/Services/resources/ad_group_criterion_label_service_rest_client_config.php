<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupCriterionLabelService' => [
            'GetAdGroupCriterionLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupCriterionLabels/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupCriterionLabels:mutate',
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

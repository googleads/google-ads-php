<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupCriterionLabelService' => [
            'GetAdGroupCriterionLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupCriterionLabels/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/adGroupCriterionLabels:mutate',
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

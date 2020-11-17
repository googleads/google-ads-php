<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupCriterionLabelService' => [
            'GetAdGroupCriterionLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupCriterionLabels/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/adGroupCriterionLabels:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupCriterionService' => [
            'GetAdGroupCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupCriteria/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupCriteria' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroupCriteria:mutate',
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

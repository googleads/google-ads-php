<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupCriterionService' => [
            'GetAdGroupCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupCriteria/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/adGroupCriteria:mutate',
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

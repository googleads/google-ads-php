<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdGroupLabelService' => [
            'GetAdGroupLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adGroupLabels/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupLabels' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/adGroupLabels:mutate',
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

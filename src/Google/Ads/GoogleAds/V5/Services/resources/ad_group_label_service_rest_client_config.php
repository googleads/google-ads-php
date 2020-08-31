<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AdGroupLabelService' => [
            'GetAdGroupLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/adGroupLabels/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/adGroupLabels:mutate',
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

<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupLabelService' => [
            'GetAdGroupLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupLabels/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/adGroupLabels:mutate',
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

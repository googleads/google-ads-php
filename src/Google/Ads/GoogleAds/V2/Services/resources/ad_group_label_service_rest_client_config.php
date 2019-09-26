<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupLabelService' => [
            'GetAdGroupLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupLabels/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupLabels:mutate',
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

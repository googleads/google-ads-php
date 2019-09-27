<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupAdLabelService' => [
            'GetAdGroupAdLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupAdLabels/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAdGroupAdLabels' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}/adGroupAdLabels:mutate',
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

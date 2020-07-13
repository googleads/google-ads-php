<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupAdLabelService' => [
            'GetAdGroupAdLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupAdLabels/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/adGroupAdLabels:mutate',
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

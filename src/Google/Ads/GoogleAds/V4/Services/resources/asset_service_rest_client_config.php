<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AssetService' => [
            'GetAsset' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/assets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateAssets' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/assets:mutate',
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

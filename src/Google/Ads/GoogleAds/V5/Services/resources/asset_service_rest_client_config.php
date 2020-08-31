<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AssetService' => [
            'GetAsset' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/assets/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/assets:mutate',
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

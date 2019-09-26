<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AssetService' => [
            'GetAsset' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/assets/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/assets:mutate',
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

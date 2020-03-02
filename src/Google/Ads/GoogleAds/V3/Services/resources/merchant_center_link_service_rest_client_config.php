<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.MerchantCenterLinkService' => [
            'ListMerchantCenterLinks' => [
                'method' => 'get',
                'uriTemplate' => '/v3/customers/{customer_id=*}/merchantCenterLinks',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GetMerchantCenterLink' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/merchantCenterLinks/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateMerchantCenterLink' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/merchantCenterLinks:mutate',
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

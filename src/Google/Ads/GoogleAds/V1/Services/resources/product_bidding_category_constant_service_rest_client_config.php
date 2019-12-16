<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ProductBiddingCategoryConstantService' => [
            'GetProductBiddingCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=productBiddingCategoryConstants/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

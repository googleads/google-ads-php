<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ProductBiddingCategoryConstantService' => [
            'GetProductBiddingCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=productBiddingCategoryConstants/*}',
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

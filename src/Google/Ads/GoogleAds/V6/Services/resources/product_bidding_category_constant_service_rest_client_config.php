<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ProductBiddingCategoryConstantService' => [
            'GetProductBiddingCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=productBiddingCategoryConstants/*}',
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

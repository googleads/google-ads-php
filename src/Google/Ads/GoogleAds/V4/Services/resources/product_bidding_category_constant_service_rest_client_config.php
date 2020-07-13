<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ProductBiddingCategoryConstantService' => [
            'GetProductBiddingCategoryConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=productBiddingCategoryConstants/*}',
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

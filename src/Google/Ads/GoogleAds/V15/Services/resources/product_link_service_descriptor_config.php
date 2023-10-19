<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ProductLinkService' => [
            'CreateProductLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\CreateProductLinkResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'RemoveProductLink' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\RemoveProductLinkResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'customer' => 'customers/{customer_id}',
                'productLink' => 'customers/{customer_id}/productLinks/{product_link_id}',
            ],
        ],
    ],
];

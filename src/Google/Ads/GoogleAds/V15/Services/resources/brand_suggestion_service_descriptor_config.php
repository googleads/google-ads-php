<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.BrandSuggestionService' => [
            'SuggestBrands' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\SuggestBrandsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

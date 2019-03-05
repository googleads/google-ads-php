<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.GoogleAdsFieldService' => [
            'GetGoogleAdsField' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=googleAdsFields/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'SearchGoogleAdsFields' => [
                'method' => 'post',
                'uriTemplate' => '/v1/googleAdsFields:search',
                'body' => '*',
            ],
        ],
    ],
];

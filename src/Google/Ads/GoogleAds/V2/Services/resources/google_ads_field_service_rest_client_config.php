<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.GoogleAdsFieldService' => [
            'GetGoogleAdsField' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=googleAdsFields/*}',
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
                'uriTemplate' => '/v2/googleAdsFields:search',
                'body' => '*',
            ],
        ],
    ],
];
